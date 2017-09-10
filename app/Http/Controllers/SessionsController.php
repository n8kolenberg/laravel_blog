<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->except('destroy');
    }

    public function create() {

        return view('sessions.create');
    }

    public function store() {
        //Attempt to authenticate the user
        /* The auth()->attempt() method checks that the given params match with whatever
           we have in the database and if they match, it signs the user in right away*/
       if(! auth()->attempt(request(['email', 'password'])) ) {
           return back()->withErrors([
               "message" => "Please check credentials and try again."
           ]);
       }

       session()->flash('message', 'Awww Yeah! Welcome back!');

        //Redirect to the homepage
        return redirect()->home();
    }

    public function destroy() {
        auth()->logout();
        return redirect()->home();
    }
}
