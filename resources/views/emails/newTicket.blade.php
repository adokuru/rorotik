<div>
Introduction

The body of your message.
<img src="{!!$message->embedData(QrCode::format('png')->size(200)->encoding('UTF-8')->generate($details['qr']), 'QrCode.png', 'image/png')!!}">

</div>
Thanks,<br>
{{ config('app.name') }}
