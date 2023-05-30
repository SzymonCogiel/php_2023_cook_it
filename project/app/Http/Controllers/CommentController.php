<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View
    {
        return view('comments.index')->withComments(Comment::all());
    }

    public function show(Comment $comment): View
    {
        return view('comments.show')->withComment($comment);
    }
}
