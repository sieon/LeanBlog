<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Post;
use Auth;

class PostsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(User $user)
    {
        $posts = Post::paginate(10);
        //$user  = User::has($post->user_id);
        return view('posts.index', compact('posts','user'));
    }

    public function show(Post $post)
    {
        $user = User::find($post->user_id);
        return view('posts.show', compact('post', 'user'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'   => 'required',
            'excerpt' => 'required',
            'content' => 'required'
        ]);

        Auth::user()->posts()->create([
          'title'   => $request->title,
          'excerpt' => $request->excerpt,
          'content' => $request->content
        ]);

        return redirect()->back();
    }
}
