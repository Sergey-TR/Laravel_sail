<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser;
use App\Jobs\NewsJob;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    protected string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function start(): void
    {
        $xml = XmlParser::load($this->getUrl());

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);

        $e = explode("/", $this->getUrl());
        $fileName = end($e);
        Storage::append('news/'. $fileName, json_encode($data));

        $category = Category::whereTitle($data['title'])->first();
        if(!$category) {
            $category = Category::create([
                'title' => $data['title']
            ]);
        }

        $newsSaveDb = News::whereCategoryId($category->id)
            ->whereIn('title',
                array_map(function ($newsItem) {
                    return $newsItem['title'];
                }, $data['news'])
            )->get();
        //dd($newsSaveDb);

        $newsSaveToDb = [];

        foreach ($data['news'] as $newsItem) {
            if($newsSaveDb->where('title', $newsItem['title'])->isNotEmpty()) continue;

            $newsSaveToDb[] = [
                'title' => $newsItem['title'],
                'category_id' => $category->id,
                'description' => $newsItem['description'],
            ];
        }
        News::insert($newsSaveToDb);
    }
}
