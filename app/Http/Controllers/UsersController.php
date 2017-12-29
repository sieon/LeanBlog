<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Post;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        $posts = $user->posts()
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);
        return view('users.show', compact('user', 'posts'));
    }
}
