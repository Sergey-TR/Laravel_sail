<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Services\ParserService;
use Illuminate\Http\Request;
use App\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $news = $parser->setUrl('https://news.yandex.ru/sport.rss')
            ->start();

        $category = Category::whereTitle($news['title'])->first();
        //dd($category);
        if(!$category) {
            $category = Category::create([
                'title' => $news['title']
            ]);
            //dd($category);
        }
        $newsSaveDb = News::whereCategoryId($category->id)
                ->whereIn('title',
                        array_map(function ($newsItem) {
                            return $newsItem['title'];
                        }, $news['news'])
                )->get();
        //dd($newsSaveDb);

        $newsSaveToDb = [];

        foreach ($news['news'] as $newsItem) {
            if($newsSaveDb->where('title', $newsItem['title'])->isNotEmpty()) continue;

            $newsSaveToDb[] = [
                'title' => $newsItem['title'],
                'category_id' => $category->id,
                'description' => $newsItem['description'],
            ];
        }
        News::insert($newsSaveToDb);
        return redirect()->route('admin.index')
                            ->with('success', 'Новости добавлены');
    }
}
