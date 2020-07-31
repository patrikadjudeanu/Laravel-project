<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailProces;
use App\Models\ProcesVerbal;
use App\Models\Firma;

class DocumentController extends Controller
{
    public function show($cod)
    {
        $proces = ProcesVerbal::where('cod', $cod)->first();

        return view('pages/document/showProces', ['proces' => $proces]);
    }

    public function update($cod, Request $request)
    {
        $proces = ProcesVerbal::where('cod', $cod)->first();

        $proces->update(
            ['semnat' => '1',
            'ip_semnat' => $request->ip(),
            'data_semnat' => date('Y/m/d')]
        );

        return redirect('/documente/proces/' . $cod);
    }

    public function sendProces($cod)
    {
        $proces = ProcesVerbal::where('cod', $cod)->first(); 
        $firma = Firma::where('cod', $proces->id_beneficiar)->first();

        if($firma->mail == '')
        return redirect('/proceseVerbale')->with('mesajProces', 'esecTrimitere')
                                          ->with('codProces', $proces->serie_pi);

        
        \Mail::to($firma->mail)->send(new MailProces($proces->cod, $proces->data_inserare));
        
        return redirect('/proceseVerbale')->with('mesajProces', 'succesTrimitere')
                                          ->with('codProces', $proces->serie_pi);
    }

    public function sendProcesFirma($cod)
    {
        $firma = Firma::where('cod', $cod)->first();

        if($firma->mail == '')
        return redirect('/clienti')->with('mesajClient', 'esecTrimitere')
                                   ->with('numeClient', $firma->denumire);

        //TODO: sendProcesFirma
        return redirect('/clienti')->with('mesajClient', 'succesTrimitere')
                                   ->with('numeClient', $firma->denumire);
    }
}
