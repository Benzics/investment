@component('mail::message')
# Hello {{ ucwords($deposit->user->name) }}.

Your total deposit of <b>{{currency_symbol() . number_format($deposit->amount + $deposit->charges, 2)}}</b> has been received, and will be reviewed shortly.
For the meantime, you can login and view your transaction history.

@component('mail::button', ['url' => url('/login')])
Login
@endcomponent

Warm Regards,<br>
{{ setting('site-name') }}
@endcomponent
