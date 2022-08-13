@component('mail::message')
# Congratulations! Your investment has successfully been placed.

Hi {{ ucwords($user) }},

You have successfully invested in the {{$investment_name}} plan with <b>{{$currency . number_format($investment->amount, 2)}}</b>.

<br>
You can login below to view your earnings.

@component('mail::button', ['url' => url('/login')])
Login
@endcomponent

Warm Regards,<br>
{{ setting('site-name') }}
@endcomponent
