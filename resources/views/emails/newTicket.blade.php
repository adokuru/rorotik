@component('mail::message')
Introduction

The body of your message.
<?php
 $qrCodeAsPng = QrCode::format('png')->size(500)->generate("my text for the QR code");
?>
<img src="{{ $message->embedData($qrCodeAsPng, 'nameForAttachment.png') }}" />

Thanks,<br>
{{ config('app.name') }}
@endcomponent
