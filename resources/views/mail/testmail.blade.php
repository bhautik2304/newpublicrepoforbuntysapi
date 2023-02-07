@component('mail::message')
# Introduction

The body of your message.

@component('mail::panel')
<center>{{$otp}}</center>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
