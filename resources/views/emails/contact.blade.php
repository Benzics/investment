@component('mail::message')
# You have a new message from {{$data['name']}}

{{$data['email']}} just sent you: <br>

{{$data['text']}}
<br>
@component('mail::button', ['url' => url('/admin/login')])
Login
@endcomponent

Thanks,<br>
{{ setting('site-name') }}
@endcomponent
