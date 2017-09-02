<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeAgain extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     * Every variable that is declared above will be available in the view down below
     * The way you can send an email to a user through php artisan tinker:
     * Mail::to($user = App\User::first())->send(new App\Mail\WelcomeAgain($user));
     * @return $this
     */
    public function build()
    {
        //The view below is generated with markdown by php artisan
        //when you use php artisan make:mail WelcomeAgain --markdown="emails.welcome-again"
        return $this->markdown('emails.welcome-again');
    }
}
