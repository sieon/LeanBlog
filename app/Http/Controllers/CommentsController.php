<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function store(CommentRequest $request, Comment $comment)
	{
    $comment->content = $request->content;
    $comment->user_id = Auth::id();
    $comment->post_id = $request->post_id;
    $comment->save();

		return redirect()->to($comment->post->link())->with('success', '创建成功！');
	}

	public function destroy(Comment $comment)
	{
		$this->authorize('destroy', $comment);
		$comment->delete();

		return redirect()->route('comments.index')->with('message', '删除成功！');
	}
}
