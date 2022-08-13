@component('mail::message')
# Your withdrawal has been received

Hello {{$user_name}},<br>
Your withdrawal request of <b>{{currency_symbol() . number_format($withdrawal->amount, 2)}}</b> to 
{{$payment_name}} address <b>{{ $withdrawal->address }}</b>
has been received and will be processed shortly. <br>
In the meantime, you can login and view your transactions.
@component('mail::button', ['url' => url('/login')])
Login
@endcomponent

Thanks,<br>
{{ setting('site-name') }}
@endcomponent
