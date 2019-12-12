@component('mail::message')
# Introduction
Dear {{ Str::title($contact->name) }}!
<p>Thank you for contacting us! We have received your letter and will reply you as soon as possible</p>

Thanks,<br>
Vũ Thế Quân!
@endcomponent
