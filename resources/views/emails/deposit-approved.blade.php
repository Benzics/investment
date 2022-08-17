@component('mail::message')
# Your deposit has been approved.

Congratulations,<br>
Your deposit of <b>{{currency_symbol() . num_format($deposit->amount)}}</b> has been
 successfully approved and its now available in your wallet.

Login to use your deposit.


@component('mail::button', ['url' => url('/login')])
Login
@endcomponent

Happy Investing!<br>
{{ config('app.name') }}
@endcomponent
