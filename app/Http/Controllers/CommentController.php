<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class CommentController extends Controller
{

    public function store(Request $request)
    {
       $request->validate([
           'comentario' => 'max:255'
       ]);

       Comment::create([
           'descripcion' => $request->comentario,
           'user_id' => $request->user,
           'post_id' => $request->post
       ]);

        return redirect()->route('posts.show',[
            'user' => auth()->user()->username,
            'post' => $request->post
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $coment)
    {
        //
    }
}
