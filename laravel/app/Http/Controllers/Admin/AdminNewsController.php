<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsShowRequest;
use App\Models\News;
use App\Models\Category;

use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsShowRequest $request)

    {
        $request->validate([
            'title' => ['required', 'string']
        ]);
        //в отличие от урока это не работает
        //dd($request);
//        $news = News::create(
//            $request->only(['category_id', 'title', 'description', 'status', 'name'])
//        );
        $news = new News([
                'category_id' => $request->category,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'name' => $request->name,
                //'image' => 'https://raw.githubusercontent.com/Sergey-TR/images/main/img/bg768.png'
            ]
        );
        //dd($news);
        $news->save();
        if($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', 'Новость успешно добавлена');
        }

        return back()->with('error', 'Новость не добавилась');
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
    public function edit(News $news)
    {
        //dd($news);
        $categories = Category::all();
        return view('admin.news.edit', compact(['news', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news = $news->fill(
        $request->only(['category_id', 'title', 'description', 'status', 'name'])
    )->save();

        if($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', 'Новость успешно обновлена');
        }

        return back()->with('error', 'Новость не обновилась');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // public function destroy(News $news): \Illuminate\Http\Response
 //   {
        //dd($news);
//        $news->delete();
//        return redirect()->route('admin.news.index')
//            ->with('success', 'Новость успешно удалена');
  //  }

    public function destroy(News $news): \Illuminate\Http\Response
    {
        $news->delete();
        return redirect()
            ->route('admin.news.index')
            ->with('success', 'News delete');
    }
}
