<div>
Introduction

The body of your message.
<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('QrCode as PNG image!')) !!}" />

</div>
Thanks,<br>
{{ config('app.name') }}
