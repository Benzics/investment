@component('mail::message')
# A new deposit was made

A deposit of <b>{{ currency_symbol() . number_format($deposit->amount + $deposit->charges, 2) }}</b> was made.
Login to manage user deposits.

@component('mail::button', ['url' => url('/admin/login')])
Login
@endcomponent

Thanks,<br>
{{ setting('site-name') }}
@endcomponent
