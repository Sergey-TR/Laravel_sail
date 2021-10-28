<?php

namespace App\Http\Requests\CommentRequests;

use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;

class EditCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Comment $comment)
    {
        return [
            'news_id' => ['required', 'integer'],
            'author' => ['required', 'string', 'min:2', 'max:250'],
            'comment' => ['required', 'string', 'min:2', 'max:500']
        ];
    }
}
