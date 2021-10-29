<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequests\EditCommentRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\News;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the comment for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $news = News::all();
        $newsComments = $news->find($id);
        return view('comment.comment-create', compact('newsComments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentStoreRequest $request)
    {
        $comment = Comment::create($request->validated());

        if($comment) {
            return redirect()
                ->route('news.show', $request->news_id)
                ->with('success', 'Комментарий добавлен');
        }
        return back()->with('error', 'Комментарий не добавлен');
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
    public function edit(Comment $comment)
    {
        $news = News::all();
        return view('comment.edit', compact(['comment', 'news']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCommentRequest $request, Comment $comment)
    {
        //dd($comment);
        if($request->author === $comment->author || $request->author === 'admin') {
            $comment = $comment->fill($request->validated())->save();
            if($comment) {
                return redirect()
                    ->route('news.show', $request->news_id)
                    ->with('success', 'COMMENT EDIT');
            }
            return back()->with('success', 'COMMENT NOT EDIT');
        }
        return back()->with('success', 'COMMENT NOT EDIT, only the author or admin can edit and delete comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //dd($comment);
        $comment->delete();
        return redirect()
            ->route('news.show', $comment->news_id)
            ->with('success', 'Comment delete complete');
    }
}
