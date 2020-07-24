@extends('layouts.withMenu')
@section('content')

    <div class = "d-flex justify-content-center" style = "padding-top: 25px;">
        <h2>{{ $client->denumire }}</h2>
    </div>

    <br><br><br>

    <div class = "d-flex justify-content-center">
        <form action="/clienti" method="POST">
            @csrf
            Cod client:  {{ $client->cod }}     
            <br><br>
            Nume client: 
            <input type="text" name="numeClient" class="form-control form-control" value = "{{ $client->denumire }}" required><br>
            E-mail client: 
            <input type="email" name="mailClient" class="form-control form-control" value = "{{ $client->email }}"><br>
            <br>
            <div class = "row justify-content-center">
                <input type="submit" name="saveButton" value="Salvare" class = "btn btn-primary" style = "margin-right:25px">
            </form>
                <a href=""><button class = "btn btn-danger" >Stergere</button></a>
            </div>
    </div>
    

@stop