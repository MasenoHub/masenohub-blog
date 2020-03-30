<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home', ['posts' => Post::where('published', true)->get()]);
    }
}
