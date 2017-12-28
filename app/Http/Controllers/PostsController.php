<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Post;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = User::all();
        return view('posts.index', compact($posts));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact($post));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
        ]);

        Auth::user()->posts()->create([
          'title' => $request->title,
          'excerpt' => $request->excerpt,
          'content' => $request->content，
        ]);

        return redirect()->back();
    }
}
