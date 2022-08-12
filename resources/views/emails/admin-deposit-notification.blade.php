@component('mail::message')
# A new deposit was made

A deposit of {{ currency_symbol() . number_format($deposit->amount + $deposit->charges, 2) }} was made.
Login to manage user deposits.

@component('mail::button', ['url' => url('/admin/login')])
Login
@endcomponent

Thanks,<br>
{{ setting('site-name') }}
@endcomponent
