<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag) {

        $posts = $tag->posts;

        return view('posts.index', compact('posts'));
    }

    public function store(Post $post) {
        $this->validate(request(), ['name' => 'required|min:2|unique:tags,name']);

        $post->addTag(request('name'));
        return back();
    }





}
