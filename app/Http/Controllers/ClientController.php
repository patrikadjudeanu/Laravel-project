<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Firma;

class ClientController extends Controller
{
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

        /*$client->updateOrInsert(
            ['denumire' => request('numeClient')],
            ['mail' => request('mailClient')]
        );
        */
        return redirect('/clienti')->with('mesajClient', 'succesUpdate')
                                   ->with('numeClient', $client->denumire);
    }
}
