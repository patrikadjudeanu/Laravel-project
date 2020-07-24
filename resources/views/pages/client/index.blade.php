@extends('layouts.withMenu')
@section('content')
    <div class = "container-fluid">
        @if(session('mesajClient') == 'succesAdaugare')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-success alert-dismissible" role="alert">
                    Firma '{{ session('numeClient') }}'' a fost adaugata.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajClient') == 'esecAdaugare')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-dark alert-dismissible" role="alert">
                    Firma nu a fost adaugata.<br>
                    Detalii incorecte sau client deja existent.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajClient') == 'succesStergere')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-success alert-dismissible" role="alert">
                    Firma '{{ session('numeClient') }}'' a fost stearsa.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class = "d-flex justify-content-center">
            <bold><span style = "font-size:25px">Clienti</span></bold>
        </div>
        <br>
        <div class = "table">
            <table
            class = "table table-striped"
            id="table"
            data-toggle="table"
            data-search="true"
            data-show-columns="true"
            data-sortable="true"
            data-pagination="true"
            data-page-size="10"
            data-page-list="[5, 10, 25, 50, 100]"
            data-show-search-clear-button="true"
            style="background-color:#ffffff">
                <thead class="thead-light">
                    <tr>
                        <th data-sortable="true" data-field="cod">Cod firma</th>
                        <th data-sortable="true" data-field="denumire">Denumire</th>
                        <th data-sortable="true" data-field="email">E-mail</th>
                        <th data-field="actiuni">Actiuni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clienti as $client)
                        <tr>
                            <th>{{ $client->cod }}</th>
                            <th>{{ $client->denumire }}</th>
                            <th>{{ $client->email }}</th>
                            <th>
                            <div style = "color: black; /* White text */
                                            padding: 10px 24px; /* Some padding */
                                            cursor: pointer; /* Pointer/hand icon */
                                            float: left; /* Float the buttons side by side */
                            ">
                                    <a href = "{{ url('clienti/' . $client->cod) }}">&#128269;</a> 
                                
                                    <form action = "/clienti/{{ $client->cod }}" method = "POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class = "btn btn-sm">&#10060;<button>
                                    </form>

                                   <a href = "{{ url('clienti/' . $client->cod) }}">&#9993;</a> 
                            </div>       
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
    <script>
    $(function() {
        $('#table').bootstrapTable()
    })
    </script>
@stop