@component('mail::message')
# Your withdrawal has been approved.

Congratulations,<br>
Your withdrawal of <b>{{currency_symbol() . num_format($withdrawal->amount)}}</b> has been
 successfully approved and its now available in your wallet.

Login to view your transactions.


@component('mail::button', ['url' => url('/login')])
Login
@endcomponent

Happy Investing!<br>
{{ config('app.name') }}
@endcomponent
