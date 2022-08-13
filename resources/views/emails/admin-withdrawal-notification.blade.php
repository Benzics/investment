@component('mail::message')
# A new withdrawal was made.

User with email {{$user_mail}} just initiated a withdrawal of <b>{{currency_symbol() . number_format($withdrawal->amount, 2)}}</b>.

Login to manage withdrawals.

@component('mail::button', ['url' => url('/admin/login')])
Login
@endcomponent

Thanks,<br>
{{ setting('site-name') }}
@endcomponent
