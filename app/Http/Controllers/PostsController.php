<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;

class PostsController extends Controller
{
    public function read(Post $post)
    {
        if (!$post->published) abort(404);

        // TODO Events
        $post->increment('views');
        $post->views++;
        return view('post', ['post' => $post]);
    }
}
