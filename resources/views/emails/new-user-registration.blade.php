@component('mail::message')
# A new user just registered to the system.

User with email adddress <b>{{$user->email}}</b> just signed up.
Login to manage users.

@component('mail::button', ['url' => url('/admin/login')])
Login
@endcomponent

Thanks,<br>
{{ setting('site-name') }}
@endcomponent
