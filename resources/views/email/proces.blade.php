@component('mail::message')
Buna ziua,


V-am trimis link-ul pentru procesul verbal din data de {{ $data }}:
<a href = "{{ url('/documente/proces/' . $cod) }}">Proces verbal</a>



Multumesc,<br>
{{ config('app.name') }}
@endcomponent
