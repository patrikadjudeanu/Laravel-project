@extends('layouts.withMenu')
@section('content')
    <div class = "d-flex justify-content-center">
            <bold><span style = "font-size:40px">Formular proces verbal</span></bold>
    </div>
    <br><br>
    <div class = "d-flex justify-content-center">
        <form action="/proceseVerbale" method="POST">
            @csrf
            Reprezentant ACTIV NET SRL: <input type="text" name="reprezentant" class="form-control form-control-sm" required><br>
            Client: <input type="text" name="client" class="form-control form-control-sm" required><br>
            Reprezentant client: <input type="text"  class="form-control form-control-sm" name="reprezentantClient" required><br>
            Problema:
            <textarea class="form-control form-control-sm"  rows="3" name="problema"></textarea><br>
            Operatiuni: 
            <textarea class="form-control form-control-sm"  rows="3" name="operatiuni"></textarea><br>
            Concluzie:  <select class="custom-select" name="concluzii" required>
                            <option hidden value="">Selectati concluzia:</option>
                            <option  value="Problema a fost rezolvata pe loc">Problema a fost rezolvata pe loc</option>
                            <option  value="Problema a fost identificata si urmeaza sa fie rezolvata">Problema a fost identificata si urmeaza sa fie rezolvata</option>
                            <option  value="Necesita inlocuirea unor echipamente">Necesita inlocuirea unor echipamente</option>
                            <option  value="Necesita interventii multiple">Necesita interventii multiple</option>
                            <option  value="Necesita preluarea echipamentului de la client">Necesita preluarea echipamentului de la client</option>
                        </select>
            <br><br><br>
            Echipament: 
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
                                <tr>
                                    <td>1</td>
                                    <td><input type="text" name="denumire1"></td>
                                    <td><input type="text" name="serie1"></td>
                                    <td><input type="number" name="cantitate1"></td>
                                    <td><input type="text" name="destinatie1"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><input type="text" name="denumire2"></td>
                                    <td><input type="text" name="serie2"></td>
                                    <td><input type="number" name="cantitate2"></td>
                                    <td><input type="text" name="destinatie2"></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><input type="text" name="denumire3"></td>
                                    <td><input type="text" name="serie3"></td>
                                    <td><input type="number" name="cantitate3"></td>
                                    <td><input type="text" name="destinatie3"></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><input type="text" name="denumire4"></td>
                                    <td><input type="text" name="serie4"></td>
                                    <td><input type="number" name="cantitate4"></td>
                                    <td><input type="text" name="destinatie4"></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><input type="text" name="denumire5"></td>
                                    <td><input type="text" name="serie5"></td>
                                    <td><input type="number" name="cantitate5"></td>
                                    <td><input type="text" name="destinatie5"></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <br>
            Ora inceput: <select class="custom-select" name="oraInceput" required>
                            <option hidden value="">Selectati ora de inceput:</option>
                            <option value="9">09:00</option>
                            <option value="10">10:00</option>
                            <option value="11">11:00</option>
                            <option value="12">12:00</option>
                            <option value="13">13:00</option>
                            <option value="14">14:00</option>
                            <option value="15">15:00</option>
                            <option value="16">16:00</option>
                        </select>
            <br><br>
            Ora sfarsit: <select class="custom-select" name="oraSfarsit" required>
                            <option hidden value="">Selectati ora de sfarsit:</option>
                            <option value="10">10:00</option>
                            <option value="11">11:00</option>
                            <option value="12">12:00</option>
                            <option value="13">13:00</option>
                            <option value="14">14:00</option>
                            <option value="15">15:00</option>
                            <option value="16">16:00</option>
                            <option value="17">17:00</option>
                        </select>  
            <br><br>
            Locatie: <select class="custom-select" name="locatie" required>
                        <option hidden value="">Locatie interventie:</option>
                        <option  value="La sediul clientului">La sediul clientului</option>
                        <option  value="Remote">Remote</option>
                        <option  value="Telefonic">Telefonic</option>
                    </select>
            <br><br>
            <input type="submit" name="submitButton" value="Adauga" class = "btn btn-primary">
            <br><br>
        </form>
    </div>
@stop