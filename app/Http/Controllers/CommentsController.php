<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function store(CommentRequest $request,$id)
    {

        $comment = new Comment;
        $comment->comment = Comment::mb_wordwrap($request->comment);
        $comment->name = \Auth::user()->name;
        $comment->user_id = \Auth::user()->id;
        $comment->gift_id =$id;
        $comment->save();
        
            return back();
    }
    
        public function destroy($comment)
    {
        $comment = Comment::findOrFail($comment);
        
        if(\Auth::id() === $comment->user_id) {
            $comment->delete();
        }
            return back();
    }
}
