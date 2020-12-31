@component('mail::message')
# See You Next Time!

We appreciate your business.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
