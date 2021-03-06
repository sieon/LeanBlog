<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Requests\Request;
use App\Http\Requests\PostRequest;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use App\Handlers\ImageUploadHandler;

use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request, Post $post, User $user)
	{
        $posts = Post::withOrder($request->order)->paginate(10);
        $active_users = $user->getActiveUsers();
        //dd($active_users);

        return view('posts.index', compact('posts', 'active_users'));
	}

    public function show(Request $request, Post $post)
    {
        // URL 矫正
        if ( ! empty($post->slug) && $post->slug != $request->slug) {
          return redirect($post->link(), 301);
        }

        return view('posts.show', compact('post'));
    }

  	public function create(User $user, Post $post)
  	{
        $categories = Category::all();
        //if ($user->can('contribute_contents')) {
            return view('posts.create_and_edit', compact('post', 'categories'));
        //}else {
        //    return redirect()->back();;
        //}
  	}

  	public function store(PostRequest $request, Post $post)
  	{
        //$post = Post::create($request->all());
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();

  		  return redirect()->to($post->link())->with('message', '创建成功！');
  	}

  	public function edit(Post $post)
  	{
        $this->authorize('update', $post);
        $categories = Category::all();
  		  return view('posts.create_and_edit', compact('post', 'categories'));
  	}

  	public function update(PostRequest $request, Post $post)
  	{
    		$this->authorize('update', $post);
    		$post->update($request->all());

    		return redirect()->to($post->link())->with('message', '更新成功！');
  	}

  	public function destroy(Post $post)
  	{
    		$this->authorize('destroy', $post);
    		$post->delete();

    		return redirect()->route('posts.index')->with('message', '删除成功！');
  	}

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'posts', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}
