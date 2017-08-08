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
        $posts = Post::orderBy('created_at', 'desc')->get(); //You can also do Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
//        dd(request(['title', 'body']));
        /*The following validates the request.
        If there are errors found, it will redirect to the previous page and provide
        a variable with the errors. Check create.blade.php for the errors variable implementation*/
        $this->validate(request(), [
            'title' => 'required|min:2',
            'body' => 'required|min:2'
        ]);

        Post::create(request(['title', 'body']));
        //Redirect to the homepage
        return redirect('/posts');
    }

    public function show(Post $post) {
        //Post::find($post) is done here through Route Model Binding
        return view('posts.show', compact('post'));
    }

}
