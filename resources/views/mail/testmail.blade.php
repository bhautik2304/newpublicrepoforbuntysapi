@component('mail::message')
# Resetpassword OTP

Do Not Share otp to Anyone.

@component('mail::panel')
<center>{{$otp}}</center>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
