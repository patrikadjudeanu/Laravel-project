<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class ProcesVerbalController extends Controller
{
    public function index()
    {
        $procese = Models\ProcesVerbal::orderBy('serie_pi', 'desc')->get();

        return view('pages/procesVerbal/index', ['procese' => $procese]);
    }

    public function create()
    {
        return view('pages/procesVerbal/create');
    }

    public function show($cod)
    {
        $proces = Models\ProcesVerbal::where('cod', $cod)->first();
        $echipamente = Models\Echipament::where('din_proces', $proces->serie_pi);

        return view('pages/procesVerbal/show', ['proces' => $proces]);
    }

    public function store()
    {
        $angajat = Models\Angajat::where('nume', request('reprezentant'))->first();
        if($angajat == null)
        {
            $reprezentant = new Models\Angajat();
            $reprezentant->nume = request('reprezentant');

            $reprezentant->save();
        }

        $firma = Models\Firma::where('denumire', request('client'))->first();
        if($firma == null)
        {
            $client = new Models\Firma();
            $client->denumire = request('client');

            $client->save();
        }


        $proces = new Models\ProcesVerbal();
        $proces->data_inserare = date("Y-m-d");
        $proces->repr_firma = request('reprezentant');
        $proces->id_repr_firma = Models\Angajat::select('id')->where('nume', request('reprezentant'))->first()->id;
        $proces->beneficiar = request('client');
        $proces->id_beneficiar = Models\Firma::select('cod')->where('denumire', request('client'))->first()->cod;
        $proces->repr_beneficiar = request('reprezentantClient');
        $proces->problema = request('problema');
        $proces->concluzie = request('concluzii');
        $proces->operatiuni = request('operatiuni');
        $proces->ora_inceput = request('oraInceput');
        $proces->ora_sfarsit = request('oraSfarsit');
        $proces->locatie_interventie = request('locatie');
        $proces->cod = ProcesVerbalController::generareCodFirma();

        if($proces->ora_inceput >= $proces->ora_sfarsit)
            return redirect('/proceseVerbale')->with('mesajProces', 'esecAdaugare');
        

        $proces->save();

        if(request('denumire1') != '')
        {
            $echipament = new Models\Echipament();
            $echipament->denumire = request('denumire1');
            $echipament->serie = request('serie1');
            $echipament->cantitate = request('cantitate1');
            $echipament->destinatie = request('destinatie1');
            $echipament->din_proces = Models\ProcesVerbal::select('serie_pi')->where('cod', $proces->cod)->first()->serie_pi;

            $echipament->save();
        }

        if(request('denumire2') != '')
        {
            $echipament = new Models\Echipament();
            $echipament->denumire = request('denumire2');
            $echipament->serie = request('serie2');
            $echipament->cantitate = request('cantitate2');
            $echipament->destinatie = request('destinatie2');
            $echipament->din_proces = Models\ProcesVerbal::select('serie_pi')->where('cod', $proces->cod)->first()->serie_pi;

            $echipament->save();
        }

        if(request('denumire3') != '')
        {
            $echipament = new Models\Echipament();
            $echipament->denumire = request('denumire3');
            $echipament->serie = request('serie3');
            $echipament->cantitate = request('cantitate3');
            $echipament->destinatie = request('destinatie3');
            $echipament->din_proces = Models\ProcesVerbal::select('serie_pi')->where('cod', $proces->cod)->first()->serie_pi;

            $echipament->save();
        }

        if(request('denumire4') != '')
        {
            $echipament = new Models\Echipament();
            $echipament->denumire = request('denumire4');
            $echipament->serie = request('serie4');
            $echipament->cantitate = request('cantitate4');
            $echipament->destinatie = request('destinatie4');
            $echipament->din_proces = Models\ProcesVerbal::select('serie_pi')->where('cod', $proces->cod)->first()->serie_pi;

            $echipament->save();
        }

        if(request('denumire5') != '')
        {
            $echipament = new Models\Echipament();
            $echipament->denumire = request('denumire5');
            $echipament->serie = request('serie5');
            $echipament->cantitate = request('cantitate5');
            $echipament->destinatie = request('destinatie5');
            $echipament->din_proces = Models\ProcesVerbal::select('serie_pi')->where('cod', $proces->cod)->first()->serie_pi;

            $echipament->save();
        }

        $serie = Models\ProcesVerbal::select('serie_pi')->where('cod', $proces->cod)->first()->serie_pi;
        return redirect('/proceseVerbale')->with('mesajProces', 'succesAdaugare')
                                          ->with('codProces', $serie);
    }

    public function destroy($cod)
    {
        $proces = Models\ProcesVerbal::where('cod', $cod)->first();

        if($proces->semnat != 0)
            return redirect('/proceseVerbale')->with('mesajProces', 'esecStergere')
                                              ->with('codProces', $proces->serie_pi);


        Models\Echipament::where('din_proces', $proces->serie_pi)->delete();
        $proces->delete();

        return redirect('/proceseVerbale')->with('mesajProces', 'succesStergere')
                                          ->with('codProces', $proces->serie_pi);
    }

    public function update($cod)
    {
        $proces = Models\ProcesVerbal::where('cod', $cod)->first();
        $semnat = Models\ProcesVerbal::where('cod', $cod)->first()->semnat;

        if(request('oraInceput') >= request('oraSfarsit') || $semnat == '1')
            return redirect('/proceseVerbale')->with('mesajProces', 'esecUpdate')
                                              ->with('codProces', $proces->serie_pi);


        if(request('denumire1') != '')
            if(request('cantitate1') == '' || request('destinatie1') == '')
                return redirect('/proceseVerbale')->with('mesajProces', 'esecUpdate')
                                                  ->with('codProces', $proces->serie_pi);
            else
            {
                $echipament = new Models\Echipament();
                $echipament->denumire = request('denumire1');
                $echipament->serie = request('serie1');
                $echipament->cantitate = request('cantitate1');
                $echipament->destinatie = request('destinatie1');
                $echipament->din_proces = $proces->serie_pi;

                $echipament->save();
            }
                                          
        if(request('denumire2') != '')
            if(request('cantitate2') == '' || request('destinatie2') == '')
                return redirect('/proceseVerbale')->with('mesajProces', 'esecUpdate')
                                                  ->with('codProces', $proces->serie_pi);
            else
                {
                    $echipament = new Models\Echipament();
                    $echipament->denumire = request('denumire2');
                    $echipament->serie = request('serie2');
                    $echipament->cantitate = request('cantitate2');
                    $echipament->destinatie = request('destinatie2');
                    $echipament->din_proces = $proces->serie_pi;
                    $echipament->save();
                }
                                          
        if(request('denumire3') != '')
            if(request('cantitate3') == '' || request('destinatie3') == '')
                return redirect('/proceseVerbale')->with('mesajProces', 'esecUpdate')
                                                  ->with('codProces', $proces->serie_pi);
            else
            {
                $echipament = new Models\Echipament();
                $echipament->denumire = request('denumire3');
                $echipament->serie = request('serie3');
                $echipament->cantitate = request('cantitate3');
                $echipament->destinatie = request('destinatie3');
                $echipament->din_proces = $proces->serie_pi;
                $echipament->save();
            }
                                              
        if(request('denumire4') != '')
            if(request('cantitate4') == '' || request('destinatie4') == '')
                return redirect('/proceseVerbale')->with('mesajProces', 'esecUpdate')
                                                  ->with('codProces', $proces->serie_pi);
            else
            {
                $echipament = new Models\Echipament();
                $echipament->denumire = request('denumire4');
                $echipament->serie = request('serie4');
                $echipament->cantitate = request('cantitate4');
                $echipament->destinatie = request('destinatie4');
                $echipament->din_proces = $proces->serie_pi;
                $echipament->save();
            }
                                  
        if(request('denumire5') != '')
            if(request('cantitate5') == '' || request('destinatie5') == '')
                return redirect('/proceseVerbale')->with('mesajProces', 'esecUpdate')
                                                  ->with('codProces', $proces->serie_pi);
        else
        {
            $echipament = new Models\Echipament();
            $echipament->denumire = request('denumire5');
            $echipament->serie = request('serie5');
            $echipament->cantitate = request('cantitate5');
            $echipament->destinatie = request('destinatie5');
            $echipament->din_proces = $proces->serie_pi;
            $echipament->save();
        }

        Models\Echipament::where('din_proces', $proces->serie_pi)->delete();

        $proces->update(
            ['repr_beneficiar' => request('reprezentantClient'),
             'problema' => request('problema'),
             'operatiuni' => request('operatiuni'),
             'concluzie' => request('concluzii'),
             'ora_inceput' => request('oraInceput'),
             'ora_sfarsit' => request('oraSfarsit'),
             'locatie_interventie' => request('locatie'),
             'data_editat' => now()]
        );


        return redirect('/proceseVerbale')->with('mesajProces', 'succesUpdate')
                                          ->with('codProces', $proces->serie_pi);
    }

    public static function generareCodFirma() 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        $exista = true;
        while($exista == true)
        {
            for ($i = 0; $i < 32; $i++) 
            {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $exista = ProcesVerbalController::existaCod($randomString);
        }

        return $randomString;
    }

    public static function existaCod($cod)
    {
        $proces = Models\ProcesVerbal::where('cod', $cod)->first();
        if($proces != null)
            return true;
        
        return false;
    }

    public static function getEchipamente($serie)
    {
        $echipamente = Models\Echipament::where('din_proces', $serie)->get();
        
        $array = array();
        
        foreach($echipamente as $e)
            $array[] = $e;

        return $array;
    }

}
