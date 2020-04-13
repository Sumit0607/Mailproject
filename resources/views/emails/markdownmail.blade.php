@component('mail::message')
# {{$greeting}}
@foreach($introLines as $line)
        {{$line}}
@endforeach
@component('mail::button', ['url' => ''])
Button Text
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
