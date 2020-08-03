@extends('layouts.withMenu')
@section('content')
    <div class = "container-fluid">
        @if(session('mesajClient') == 'succesAdaugare')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-success alert-dismissible" role="alert">
                    Firma '{{ session('numeClient') }}' a fost adaugata.
                    <br><br>
                    <div class = "row justify-content-center">
                        <form action = "/clienti/{{ session('codClient') }}" style = "padding-right:5px">
                            @csrf
                            <input type = "submit" class = "btn btn-warning btn-sm" value = "Detalii">
                        </form>
                        <form action = "/clienti/{{ session('codClient') }}" method = "POST" style = "padding-left:5px">
                            @csrf
                            @method('DELETE')
                            <input type = "submit" class = "btn btn-danger btn-sm" value = "Stergere">
                        </form>
                    </div>
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
        @elseif(session('mesajClient') == 'succesUpdate')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-success alert-dismissible" role="alert">
                    Firma '{{ session('numeClient') }}' a fost editata.
                    <br><br>
                    <div class = "row justify-content-center">
                        <form action = "/clienti/{{ session('codClient') }}" style = "padding-right:5px">
                            @csrf
                            <input type = "submit" class = "btn btn-warning btn-sm" value = "Detalii">
                        </form>
                        <form action = "/documente/firma/trimiteProcese/{{ session('codClient') }}" method = "POST"style = "padding-left:5px;padding-right:5px">
                            @csrf
                            <input type = "submit" class = "btn btn-warning btn-sm" value = "Trimite procese">
                        </form>
                        <form action = "/clienti/{{ session('codClient') }}" method = "POST"style = "padding-left:5px">
                            @csrf
                            @method('DELETE')
                            <input type = "submit" class = "btn btn-danger btn-sm" value = "Stergere">
                        </form>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajClient') == 'esecUpdate')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-dark alert-dismissible" role="alert">
                    Firma '{{ session('numeClient') }}' exista deja. Editarea a esuat.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajClient') == 'succesStergere')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-success alert-dismissible" role="alert">
                    Firma '{{ session('numeClient') }}' a fost stearsa.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajClient') == 'esecStergere')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-dark alert-dismissible" role="alert">
                    Firma '{{ session('numeClient') }}' are procese semnate. Stergerea a esuat.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajClient') == 'succesTrimitere')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-success alert-dismissible" role="alert">
                    Procesele verbale ale firmei '{{ session('numeClient') }}' au fost trimise.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajClient') == 'esecTrimitere')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-dark alert-dismissible" role="alert">
                    Firma '{{ session('numeClient') }}' nu are adresa de e-mail. Trimiterea a esuat.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class = "d-flex justify-content-center">
            <bold><span style = "font-size:40px">Clienti</span></bold>
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
                            <th>{{ $client->mail }}</th>
                            <th>
                            <div class = "row">   
                                    <form action = "/clienti/{{ $client->cod }}">
                                        @csrf
                                        <input type="submit"  class = "btn btn-sm" value = "&#128269;">
                                    </form>
                                    <form action = "/clienti/{{ $client->cod }}" method = "POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit"  class = "btn btn-sm" value = "&#10060;">
                                    </form>
                                    <form action = "/documente/firma/trimiteProcese/{{ $client->cod }}" method = "POST">
                                        @csrf
                                        <input type="submit"  class = "btn btn-sm" value = "&#9993;">
                                    </form>
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