<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PagesController extends Controller
{

    public function home()
    {
        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(10);
        }

        return view('pages.home', compact('feed_items'));
    }

    public function blog()
    {
        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(10);
        }

        return view('pages.blog', compact('feed_items'));
    }

    public function about()
    {
        return view('pages.about', compact('page'));
    }

    public function help()
    {
        return view('pages.help');
    }
}