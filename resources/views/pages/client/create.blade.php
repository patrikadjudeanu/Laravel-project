@extends('layouts.withMenu')
@section('content')
    <div class = "d-flex justify-content-center">
        <bold><span style = "font-size:40px">Adaugare client</span></bold>
    </div>
    <div class = "container-flex" style = "margin-top: 200px">
        <form action="/clienti" method="POST">
            @csrf
            Nume client: 
            <input type="text" name="numeClient" class="form-control form-control" required><br>
            E-mail client: 
            <input type="email" name="mailClient" class="form-control form-control" ><br>
            <input type="submit" name="submitButton" value="Adauga" class = "btn btn-primary">
        </form>
    </div>
@stop