@component('mail::message')
# Welcome to {{setting('site-name')}}

Hello {{$user->name}}, <br>

You are welcome to the family, and on your way to financial breakthrough. <br>
Do have a lovely experience. You can login to start your investment.
@component('mail::button', ['url' => url('/login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
