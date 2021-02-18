<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request,$id)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);
        
        // ここに不具合あり
        
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->name = \Auth::user()->name;
        $comment->user_id = \Auth::user()->id;
        $comment->gift_id =$id;
        $comment->save();
                
            return redirect('/');
    }
    
    public function destroy($id)
    {
        return back();
    }
}
