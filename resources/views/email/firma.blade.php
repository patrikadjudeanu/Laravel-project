@component('mail::message')
Buna ziua,


V-am trimis link-urile pentru procesele verbale din:
@foreach($procese as $proces)
    <a href = "{{ url('/documente/proces/' . $proces->cod) }}">{{ $proces->data_inserare }}</a>
    <br>
@endforeach



Multumesc,<br>
{{ config('app.name') }}
@endcomponent
