<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Firma;
use App\Models\ProcesVerbal;
use App\Models\Echipament;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('pages/client/create');
    }

    public function index()
    {
        $clienti = Firma::orderBy('cod', 'desc')->get();

        return view('pages/client/index', ['clienti' => $clienti]);
    }

    public function show($cod)
    {
        $client = Firma::where('cod', $cod)->first();

        return view('pages/client/show', ['client' => $client]);
    }

    public function store()
    {   
        $client = Firma::where('denumire', request('numeClient'))->first();
            if($client != null)
                return redirect('/clienti')->with('mesajClient', 'esecAdaugare');

        $client = new Firma();
        $client->denumire = request('numeClient');
        $client->mail = request('mailClient');

        $client->save();

        $codFirma = Firma::select('cod')->where('denumire', request('numeClient'))->first()->cod;

        return redirect('/clienti')->with('mesajClient', 'succesAdaugare')
                                   ->with('numeClient', $client->denumire)
                                   ->with('codClient', $codFirma);
    }

    public function destroy($cod)
    {
        $client = Firma::where('cod', $cod)->first();

        $procesSemnat = ProcesVerbal::where('semnat', '1')->where('id_beneficiar', $cod)->first();
        if($procesSemnat != null)
            return redirect('/clienti')->with('mesajClient', 'esecStergere')
                                       ->with('numeClient', $client->denumire);

        $procese = ProcesVerbal::where('id_beneficiar', $cod)->get();
        foreach($procese as $proces)
        {
            Echipament::where('din_proces', $proces->serie_pi)->delete();
            $proces->delete();
        }       

        $client->delete();

        return redirect('/clienti')->with('mesajClient', 'succesStergere')
                                   ->with('numeClient', $client->denumire);
    }

    public function update($cod)
    {
        $client = Firma::where('cod', $cod)->first();
        
        $firma = Firma::where('denumire', request('numeClient'))->first();
        if($firma != null && $client->cod != $firma->cod)
            return redirect('/clienti')->with('mesajClient', 'esecUpdate')
                                       ->with('numeClient', $client->denumire);

        $client->update(
            ['denumire' => request('numeClient'),
            'mail' => request('mailClient')]
        );

        $procese = ProcesVerbal::where('id_beneficiar', $cod)->get();
        foreach($procese as $proces)
            $proces->update(
                ['beneficiar' => request('numeClient')]
                );
        
        return redirect('/clienti')->with('mesajClient', 'succesUpdate')
                                   ->with('numeClient', $client->denumire);
                                   
    }
}
