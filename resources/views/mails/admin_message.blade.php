@component('mail::message')

{!! $message !!}

<br><br>
Thank you for choosing {{ config('app.name') }}.
<br>

@endcomponent