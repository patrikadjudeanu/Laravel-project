@extends('layouts.withMenu')
@section('content')

    <div class = "d-flex justify-content-center" style = "padding-top: 25px;">
        <h2>Proces Verbal Nr. {{ $proces->serie_pi }}</h2>
    </div>

    <br><br><br>

    <div class = "d-flex justify-content-center">
        <form action="/proceseVerbale" method="POST">
            @csrf
            <div class = "row justify-content-center">
                <div class = "col-3">
                    <b>Data inserare:</b> <br> {{ $proces->data_inserare }}<br><br>
                </div>
                <div class = "col-3">
                    <b>Data editare:</b> <br> {{ ($proces->data_editare != '') ?  $proces->data_editare : 'Procesul nu a fost editat.' }}<br><br>
                </div>
            </div>
            <br>
            <div class = "row justify-content-center">
                <div class = "col-4">
                    <b>Reprezentant ACTIV NET SRL:</b> <br> {{ $proces->repr_firma }}<br>
                </div>
                <div class = "col-5"  style = "padding-left: 50px; padding-top: 5px;">
                    <b>ID Reprezentant ACTIV NET SRL:</b>  <br> {{ $proces->id_repr_firma }}<br><br>
                </div>
            </div>
            <br>
            <div class = "row justify-content-center">
                <div class = "col-3">
                    <b>Client:</b> <br> {{ $proces->beneficiar }}<br><br>
                </div>
                <div class = "col-3">
                    <b>ID Client:</b> <br> {{ $proces->id_beneficiar }}<br><br>
                </div>
            </div>
            <br>
            <b>Reprezentant client:</b> <input type="text"  class="form-control form-control-sm" name="reprezentantClient" value = "{{ $proces->repr_beneficiar }}" required><br>
            <b>Problema:</b>
            <textarea class="form-control form-control-sm"  rows="3" name="problema">{{ $proces->problema }}</textarea><br>
            <b>Operatiuni:</b> 
            <textarea class="form-control form-control-sm"  rows="3" name="operatiuni">{{ $proces->operatiuni }}</textarea><br>
            <b>Concluzie:</b>  <select class="custom-select" name="concluzii" required>
                            <option  hidden value="{{ $proces->concluzie }}">{{ $proces->concluzie }}</option>
                            <option  value="Problema a fost rezolvata pe loc">Problema a fost rezolvata pe loc</option>
                            <option  value="Problema a fost identificata si urmeaza sa fie rezolvata">Problema a fost identificata si urmeaza sa fie rezolvata</option>
                            <option  value="Necesita inlocuirea unor echipamente">Necesita inlocuirea unor echipamente</option>
                            <option  value="Necesita interventii multiple">Necesita interventii multiple</option>
                            <option  value="Necesita preluarea echipamentului de la client">Necesita preluarea echipamentului de la client</option>
                        </select>
            <br><br><br>
            <b>Echipament:</b> 
            <br><br>
            <div class = "table-responsive">
            <table class="table table-bordered" style = "width: 40%;background-color: #ffffff">
                            <thead>
                                <tr>
                                    <th>Nr.</th>
                                    <th>Denumire</th>
                                    <th>Serie</th>
                                    <th>Cantitate</th>
                                    <th>Destinatie</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
	                                $cate = 1;
                                    $echipamente = app\Http\Controllers\ProcesVerbalController::getEchipamente($proces->serie_pi);

                                    foreach($echipamente as $echipament)
                                    {
                                        echo '
                                            <tr>
                                                <td> '. $cate . '</td>
                                                <td><input type="text" name="denumire ' . $cate . '" value = " ' . $echipament->denumire . ' "></td>
                                                <td><input type="text" name="serie ' . $cate . '"  value = " ' . $echipament->serie . '"></td>
                                                <td><input type="number" name="cantitate ' . $cate . '" value = "' . $echipament->cantitate . '"></td>
                                                <td><input type="text" name="destinatie ' . $cate . '" value = " ' . $echipament->destinatie . '"></td>
                                            </tr>
                                        ';	
                                        $cate++;
                                    }

                                    while($cate < 6)
                                    {
                                        echo '
                                            <tr>
                                                <td> '. $cate . '</td>
                                                <td><input type="text" name="denumire ' . $cate . '"></td>
                                                <td><input type="text" name="serie ' . $cate . '"></td>
                                                <td><input type="number" name="cantitate ' . $cate . '"></td>
                                                <td><input type="text" name="destinatie ' . $cate . '"></td>
                                            </tr>
                                        ';	
                                        $cate++;
                        
                                    }
                                @endphp
                            </tbody>
                        </table>
                        </div>
                        <br>
            <div class = "row">
                <div class = "col">
                    <b>Ora inceput:</b> <select class="custom-select" name="oraInceput" required>
                                    <option hidden value="{{ $proces->ora_inceput }}">{{ $proces->ora_inceput . ":00" }}</option>
                                    <option value="9">09:00</option>
                                    <option value="10">10:00</option>
                                    <option value="11">11:00</option>
                                    <option value="12">12:00</option>
                                    <option value="13">13:00</option>
                                    <option value="14">14:00</option>
                                    <option value="15">15:00</option>
                                    <option value="16">16:00</option>
                                </select>
                </div>
                <div class = "col">
                    <b>Ora sfarsit:</b> <select class="custom-select" name="oraSfarsit" required>
                                    <option hidden value="{{ $proces->ora_sfarsit }}">{{ $proces->ora_sfarsit . ":00" }}</option>
                                    <option value="10">10:00</option>
                                    <option value="11">11:00</option>
                                    <option value="12">12:00</option>
                                    <option value="13">13:00</option>
                                    <option value="14">14:00</option>
                                    <option value="15">15:00</option>
                                    <option value="16">16:00</option>
                                    <option value="17">17:00</option>
                                </select> 
                </div> 
            </div>
            <br><br>
            <b>Locatie:</b> <select class="custom-select" name="locatie" required>
                        <option hidden value="{{ $proces->locatie_interventie }}">{{ $proces->locatie_interventie }}</option>
                        <option value="La sediul clientului">La sediul clientului</option>
                        <option value="Remote">Remote</option>
                        <option value="Telefonic">Telefonic</option>
                    </select>
            <br><br>
            <b>Cod:</b> <br> {{ $proces->cod }}<br><br>
            <b>Semnat:</b> {{ ($proces->semnat == 0 ) ? '❌' :  '✔️'}}
            
            @if($proces->semnat == 1)
                <br>
                La data: {{ $proces->data_semnat }}
                <br>
                De pe IP: {{ $proces->ip_semnat }}
            @endif

            <br><br><br>
            <div class = "row justify-content-center">
                <input type="submit" name="saveButton" value="Salvare" class = "btn btn-primary" style = "margin-right:25px">
            </form>
            <form action = "/proceseVerbale/{{ $proces->cod }}" method = "POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="deleteButton" value="Stergere" class = "btn btn-danger">
            </form>
            </div>
        <br>
    </div>
    <br><br>

@stop