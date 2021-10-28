<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";

    protected $fillable = [
        'author', 'comment', 'news_id'
    ];

    public function newsComments()
    {
        return $this->belongsTo(News::class);
    }
}
