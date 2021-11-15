<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Models\News;
use App\Models\Category;

use App\Services\ImageService;
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
     * Show the comment for creating a new resource.
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
    public function store(NewsStoreRequest $request)
    {
        //dd($request);
        $news = News::create($request->validated());
        if($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', __('messages.admin.categories.store.success'));
        }

        return back()->with('error', __('messages.admin.news.store.fail'));
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
     * Show the comment for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
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
    public function update(NewsStoreRequest $request, News $news)
    {
        $validated = $request->validated();
        if(isset($validated['image']) && !is_null($validated['image'])) {
            $service = app(ImageService::class);
            $validated['image'] = $service->imageUpload($validated['image']);
        }
        $news = $news->fill($validated)->save();

        if($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
        }

        return back()->with('error', __('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //dd($news);
        $news->delete();
        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Новость успешно удалена');
    }
}
