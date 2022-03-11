<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        $this->data['posts'] = Post::where('editor_pick', '=', true)->get();
        return view('pages.main.home', $this->data);
    }
}
