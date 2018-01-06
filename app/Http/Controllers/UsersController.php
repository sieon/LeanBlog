<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Post;
use App\Handlers\ImageUploadHandler;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    // public function index()
    // {
    //     $users = User::all();
    //     return view('users.index', compact('users'));
    // }

    public function show(User $user)
    {
        $posts = $user->posts()
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);
        return view('users.show', compact('user', 'posts'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
        $this->authorize('update', $user);
        $data = $request->all();

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 506);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }

    // 显示关注的人
     public function followings(User $user)
     {
         $users = $user->followings()->paginate(30);
         $title = '关注的人';
         return view('users.show_follow', compact('user', 'users', 'title'));
     }

     // 粉丝
     public function followers(User $user)
     {
         $users = $user->followers()->paginate(30);
         $title = '粉丝';
         return view('users.show_follow', compact('user', 'users', 'title'));
     }
}
