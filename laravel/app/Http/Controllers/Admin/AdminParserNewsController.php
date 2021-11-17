<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsJob;
use App\Models\Category;
use App\Models\News;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Contracts\Parser;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as XmlParser;

class AdminParserNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rssLinks = Resource::all();

        foreach ($rssLinks as $rssLink) {
           $this->dispatch(new NewsJob($rssLink->resource_url));
        }

        return redirect()->route('admin.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::whereTitle($request->category_id)->first();
        if(!$category) {
            $category = Category::create([
                'title' => $request->category_id
            ]);
        }
        $news = new News(
            [
                'category_id' => $category->id,
                'title' => $request->title,
                'description' => $request->description
            ]
        );
        $newsCheck = News::whereTitle($news->title)->first();
        if(!$newsCheck) {
            $news->save();
                if($news) {
                    return redirect()
                        ->route('admin.news.index')
                        ->with('success', 'Новость успешно добавлена');
                }
            return back()->with('error', 'Новость не добавилась');
        }
        return back()->with('success', 'Новость уже существует');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
