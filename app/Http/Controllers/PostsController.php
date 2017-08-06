<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('posts.index');
    }

    public function create() {
        return view('posts.create');
    }


    public function store() {
//        dd(request(['title', 'body']));
        Post::create(request(['title', 'body']));
        //Redirect to the homepage
        return view('posts.index');
    }

}
