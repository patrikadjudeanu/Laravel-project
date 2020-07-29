@extends('layouts.document')
@section('content')
<div class = "row justify-content-center">
    <div class = "col-4" style="border-style: solid; border-width: thin">
        <span style = "font-weight:800">PROCES VERBAL DE INTERVENTIE</span><br>
        (denumit in continuare <span style = "font-weight:800">"Procesul Verbal"</span>)
    </div>
    <div class = "col-2" style="border-style: solid; border-width: thin">
        <div style="font-weight: 700">
            Versiunea 1.0
        </div>
        <div style="font-weight: 700">
            Seria PI nr.: {{ $proces->serie_pi }}
        </div>
        <div style="font-weight: 700">
            Data: {{ date("Y/m/d") }}
        </div>
    </div>
</div>          
<br><br>
<div class = "container">
    Intre Activ NET SRL, reprezentata prin {{ $proces->repr_firma }} in calitate de tehnician, si
    {{ $proces->beneficiar }} , reprezentata de {{ $proces->repr_beneficiar }} , in calitate de beneficiar.<br>
</div>
<br><br>
<div class="container">
    <span style = "font-weight:bold">Problema:</span><br>
    {{ $proces->problema }}
</div>
<br>
<div class = "container">
    <span style = "font-weight:bold">Pentru remedierea problemelor, s-au facut urmatoarele operatiuni:</span><br>
    {{ $proces->operatiuni }}
</div>
<br>
<div class="container">
    <span style = "font-weight:bold">Concluzie:</span><br>
    {{ $proces->concluzie }}
</div>
<br>
<div class="container">
    <span style = "font-weight:bold">Echipamente inlocuite in cadrul interventiei:</span>
    <br>
    @php
        $echipamente = App\Http\Controllers\ProcesVerbalController::getEchipamente($proces->serie_pi);
        foreach($echipamente as $echipament)
            echo '- ' . $echipament->denumire . ' ' . $echipament->serie . ' ' . $echipament->cantitate . ' bucati la  ' . $echipament->destinatie . '<br>';
    @endphp
</div>
<br>
<div class="container">
    <span style = "font-weight:bold">Interventia s-a desfasurat in intervalul orar:</span><br>
    {{ $proces->ora_inceput }}:00 - {{ $proces->ora_sfarsit }}:00
</div>
<br>
<div class="container">
    <span style = "font-weight:bold">Interventia a fost efectuata :</span><br>
    {{ $proces->locatie_interventie }}
</div>
<br><br>
<div class="d-flex justify-content-center">
    Acest proces verbal a fost incheiat astazi, in doua exemplare originale, cate unul pentru fiecare parte.<br>
</div>
<br><br>
<div class = "container">
    <div class = "row justify-content-between">
        <div class = "col-2">
            Am predat:<br>
            Activ Net SRL<br>
            {{ $proces->repr_firma }}<br>
            {{ $proces->data_inserare }}
        </div>
        <div class = "col-3">
            Am primit:<br>
            {{ $proces->beneficiar }}<br>
            {{ $proces->repr_beneficiar }}<br>
            @if($proces->semnat == 0)
                <form action = "/documente/proces/semnare/{{ $proces->cod }}" method = "POST">
                    @csrf
                    <input type = "submit" class = "btn btn-info" value = "Semnare">
                </form>
            @else
                Procesul a fost semnat electronic.<br>
                IP: {{ $proces->ip_semnat }}<br>
                Data: {{ $proces->data_semnat }}<br>
            @endif
        </div>
    </div>
</div>
<br><br><br>
<div class="container">
    Website: www.activ.net<br>
    Telefon: 0722699018<br>
    E-mail: dani.radulescu@activ.net<br>
    Fax: 0357815320
</div>
<br><br><br>
@stop