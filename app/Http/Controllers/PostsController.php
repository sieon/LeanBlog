<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request, Post $post)
	{
		$posts = Post::withOrder($request->order)->paginate(10);
		return view('posts.index', compact('posts'));
	}

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

	public function create(Post $post)
	{
        $categories = Category::all();
		return view('posts.create_and_edit', compact('post', 'categories'));
	}

	public function store(PostRequest $request, Post $post)
	{
		//$post = Post::create($request->all());
        $post->fill($request->all());
        $post->user_id = Auth::user()->id;
        $post->save();

		return redirect()->route('posts.show', $post->id)->with('message', '创建成功！');
	}

	public function edit(Post $post)
	{
        $this->authorize('update', $post);
		return view('posts.create_and_edit', compact('post'));
	}

	public function update(PostRequest $request, Post $post)
	{
		$this->authorize('update', $post);
		$post->update($request->all());

		return redirect()->route('posts.show', $post->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Post $post)
	{
		$this->authorize('destroy', $post);
		$post->delete();

		return redirect()->route('posts.index')->with('message', 'Deleted successfully.');
	}
}