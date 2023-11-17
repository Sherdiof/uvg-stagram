<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(4);
        //$conteo = Post::all()->count();

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
           // 'conteo' => $conteo
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['titulo' => 'required|max:255', 'descripcion' => 'required', 'imagen' => 'required']);

        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        $comments = Comment::where('post_id', $post->id)->get();
        //$conteo = Comment::all()->count();

        return view('posts.show', [
                'post' => $post,
                'user' => $user,
                'comments' => $comments,
                //'conteo' => $conteo
            ]
        );

    }
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $image_path = public_path('uploads/' . $post->image);
        $post->delete();

        if (File::exists($image_path)) {
            unlink($image_path);
        }
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
