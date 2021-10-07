<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        $category = $news->category()->get()[0];
        return view('news.show', compact(['news','category']));
    }

    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

}
