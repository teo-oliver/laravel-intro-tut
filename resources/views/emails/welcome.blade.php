@component('mail::message')
# Hello from Teo

Welcome to our cool application

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
