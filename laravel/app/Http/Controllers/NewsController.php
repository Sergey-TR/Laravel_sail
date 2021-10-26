<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::Paginate(6);
        return view('news.index', compact('news'));
    }

    public function show(News $news, User $user)
    {
//        $comments = [];
//        if (Storage::exists(FILE_ABOUT_COMMENT_NAME)){
//            $comments = json_decode(Storage::get(FILE_ABOUT_COMMENT_NAME));
//        }
        $category = $news->category()->get()[0];
        return view('news.show', compact(['news','category']));
    }

//    public function create(News $news)
//    {
//        $comments = [];
//        if (Storage::exists(FILE_ABOUT_COMMENT_NAME)){
//            $comments = json_decode(Storage::get(FILE_ABOUT_COMMENT_NAME));
//        }
//        return view('news.show', compact('comments'));
//    }


}
