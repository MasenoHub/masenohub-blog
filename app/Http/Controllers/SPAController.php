<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class SPAController extends Controller
{
    /**
     * Render the Vue SPA.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('spa');
    }
}
