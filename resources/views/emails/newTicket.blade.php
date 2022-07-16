@component('mail::message')
# Introduction

The body of your message.

<img src="{{ $message->embedData($details['qr'], 'nameForAttachment.png') }}" />

Thanks,<br>
{{ config('app.name') }}
@endcomponent
