@component('mail::message')
# A New Investment Has Been Made

You can use the button below to login and view all investments.

@component('mail::button', ['url' => $url])
LOGIN NOW
@endcomponent

This is an auto-generated email.<br>
{{ setting('site-name') }}
@endcomponent
