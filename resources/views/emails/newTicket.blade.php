@component('mail::message')
# Introduction

The body of your message.

<img src="{!!$message->embedData($details['qr'], 'QrCode.png', 'image/png')!!}">

Thanks,<br>
{{ config('app.name') }}
@endcomponent
