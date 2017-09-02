{{--If you would like to customize any of the styling of this email, use
    php artisan vendor:publish --tag=laravel-mail
    It will then copy all of the styling files into a mail folder in vendor in the resources folder
    Suggestion is to duplicate the CSS file, call it differently, customize, and then to use it, you need
    to change the name of the 'theme' used in the email to your CSS file in config\mail.php
--}}

@component('mail::message')
# Introduction

Thanks so much for signing up with us, {{$user->name}}!
------
This is the best place for helping out pet-owners taking care of their beloved pet while they temporarily can't!


@component('mail::button', ['url' => 'https://www.youtube.com/results?search_query=rent+a+pet'])
Start browsing our pet library
@endcomponent

@component('mail::panel', ['url' => ''])
    Keep calm and take care of a pet
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
