<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;
use App\Mail\Welcome;
use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function create() {
        return view('registration.create');
    }

    public function store(RegistrationForm $form) {
        //Validate form - I moved this to the RegistrationRequest Class
//        $this->validate(request(), [
//            'name' => 'required',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|confirmed' //The type must be password and it must match the confirmation input
//        ]);

//        //Create and save the user
//        $user = User::create([
//            'name' => request('name'),
//            'email' => request('email'),
//            'password' => bcrypt(request('password'))
//        ]);
//
//        //Sign them in
//        /*We're using the auth() helper function because if we used the default
//        Auth::login, we would either have to escape it \ or add use Auth at the top*/
//        auth()->login($user);
//
//        //Let's send an email to the user after they sign up
//        \Mail::to($user)->send(new Welcome($user));

        $form->persist();
        //Redirect to homepage
        return redirect()->home();
    }
}
