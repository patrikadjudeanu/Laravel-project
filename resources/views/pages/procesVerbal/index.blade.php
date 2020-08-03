@extends('layouts.withMenu')
@section('content')
    <div class = "container">
        @if(session('mesajProces') == 'succesAdaugare')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-success alert-dismissible" role="alert">
                    Procesul verbal cu seria {{ session('serieProces') }} a fost adaugat.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajProces') == 'esecAdaugare')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-dark alert-dismissible" role="alert">
                    Procesul verbal nu a fost adaugat.<br>
                    Detalii incorecte.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajProces') == 'succesStergere')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-success alert-dismissible" role="alert">
                    Procesul verbal cu seria {{ session('serieProces') }} a fost sters.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajProces') == 'esecStergere')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-dark alert-dismissible" role="alert">
                    Procesul verbal nu a fost sters. Procesele semnate sunt stocate definitiv.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajProces') == 'succesUpdate')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-success alert-dismissible" role="alert">
                    Procesul verbal cu seria {{ session('serieProces') }} a fost modificat.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajProces') == 'esecUpdate')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-dark alert-dismissible" role="alert">
                    Procesul verbal cu seria {{ session('serieProces') }} nu a fost modificat. Date incorecte sau proces semnat.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajProces') == 'succesTrimitere')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-success alert-dismissible" role="alert">
                    Procesul verbal cu seria {{ session('serieProces') }} a fost trimis.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session('mesajProces') == 'esecTrimitere')
            <div class = "d-flex justify-content-center" style="text-align: center; padding-top: 10px">
                <div class="alert alert-dark alert-dismissible" role="alert">
                    Procesul verbal nu a fost trimis.<br>
                    Adresa de e-mail nu este precizata.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class = "d-flex justify-content-center">
            <bold><span style = "font-size:40px">Procese verbale</span></bold>
        </div>
        <br>
        <div class = "table">
            <table
            class = "table table-striped"
            id="table"
            data-toggle="table"
            data-detail-view="true"
            data-detail-view-icon="false"
            data-detail-view-by-click="true"
            data-detail-formatter = "detailFormatter"
            data-click-to-select="true"
            data-search="true"
            data-show-columns="true"
            data-sortable="true"
            data-pagination="true"
            data-filter-control="true"
            data-page-size="5"
            data-page-list="[5, 10, 25, 50, 100]"
            data-show-search-clear-button="true"
            style="background-color:#ffffff">
                <thead class="thead-light">
                    <tr>
                        <th data-sortable="true" data-field="serie">Serie</th>
                        <th data-sortable="true" data-field="data">Data</th>
                        <th data-sortable="true" data-filter-control="select" data-field="reprezentant">Reprezentant firma</th>
                        <th data-sortable="true" data-filter-control="select" data-field="client">Client</th>
                        <th data-sortable="true" data-field="repClient" data-visible="false">Reprezentant client</th>
                        <th data-sortable="true" data-field="problema">Problema</th>
                        <th data-sortable="true" data-field="operatiuni">Operatiuni</th>
                        <th data-sortable="true" data-filter-control="select" data-field="concluzie">Concluzie</th>
                        <th data-sortable="true" data-filter-control="select" data-field="locatie">Locatie</th>
                        <th data-sortable="true" data-field="oraI" data-visible="false">Ora inceput</th>
                        <th data-sortable="true" data-field="oraS" data-visible="false">Ora sfarsit</th>
                        <th data-sortable="true" data-field="echipamente" data-visible="false">Echipamente</th>
                        <th data-sortable="true" data-filter-control="select" data-field="semnat">Semnat</th>
                        <th data-field="actiuni">Actiuni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($procese as $proces)
                        <tr>    
                            <th>{{$proces->serie_pi}}</th>
                            <th>{{$proces->data_inserare}}</th>
                            <th>{{$proces->repr_firma}}</th>
                            <th>{{$proces->beneficiar}}</th>
                            <th>{{$proces->repr_beneficiar}}</th>    
                            <th>{{$proces->problema}}</th>
                            <th>{{$proces->operatiuni}}</th>
                            <th>{{$proces->concluzie}}</th>
                            <th>{{$proces->locatie_interventie}}</th> 
                            <th>{{$proces->ora_inceput}}:00</th>
                            <th>{{$proces->ora_sfarsit}}:00</th>
                            <th>
                                @php
                                    $echipamente = app\Http\Controllers\ProcesVerbalController::getEchipamente($proces->serie_pi);
                                    foreach($echipamente as $echipament)
                                        echo $echipament->denumire . ' ' . $echipament->serie . ' ' . $echipament->cantitate . ' ' . $echipament->destinatie . '<br>';
                                @endphp
                            </th>
                            <th>{{($proces->semnat == 0) ? '❌' : '✔️'}}</th>
                            <th style="height:50px">
                                <div class = "row">
                                    <form action = "/proceseVerbale/{{ $proces->cod }}">
                                        @csrf
                                        <input type="submit"  class = "btn btn-sm" value = "&#128269;">
                                    </form>
                                    <form action = "/proceseVerbale/{{ $proces->cod }}" method = "POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit"  class = "btn btn-sm" value = "&#10060;">
                                    </form>
                                    <form action = "/documente/proces/trimiteProces/{{ $proces->cod }}" method = "POST">
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
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        var $table = $('#table')
        var $button = $('#button')

        $(function() {
            $button.click(function () {
            $table.bootstrapTable('toggleDetailView', 1)
            })
        })

        function detailFormatter(index, row) {
            var output = '';

            if(row['echipamente'] != '')
                output = "<b>Echipamente:</b> <br />" + row['echipamente'] + "<br />";
            else
                output = "<b>Nu exista echipamente.</b>"
            return output;
        }
    </script>   

@stop