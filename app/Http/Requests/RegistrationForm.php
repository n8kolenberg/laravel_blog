<?php

namespace App\Http\Requests;

use App\Mail\WelcomeAgain;
use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Support\Facades\Mail;

//Your RegistrationRequest extends FormRequest class, which means
//it's a child of the Request class and as such you can access any fields of the form
//simply by referencing them
class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Any user should be able to register and won't have to be logged in beforehand
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Think of this class as a request to submit the form and as part of that request,
     * we need to validate it - I copied the validation from the RegistrationController here
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "email" => "required|email",
            "password" => "required|confirmed" //The type must be password and it must match the confirmation input
        ];
    }

    /*
     * This function will now take over the store method from the RegistrationController
     * */
    public function persist() {
        /*
         * Tip about Requests
         * When you use request(['']) - it's identical to doing request()->only([''])
         * */

        //Create and save the user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        //Sign them in
        /*We're using the auth() helper function because if we used the default
        Auth::login, we would either have to escape it \ or add use Auth at the top*/
        auth()->login($user);

        //Let's send an email to the user after they sign up
        Mail::to($user)->send(new WelcomeAgain($user));
    }
}
