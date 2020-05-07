<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leads;

class LeadsController extends Controller
{
    public function store( Request $request ) {
    
        $this->validate($request, [
            'nombres'   => 'required',
            'apellidos'   => 'required',
            'email'   => 'required|email',
            'telefono'   => 'required',
            'programa'   => 'required',
        ]);

        $lead = Leads::updateOrInsert(
            [
                'email'     => $request->email,
            ],
            [
            'nombres'     => $request->nombres,
            'apellidos'     => $request->apellidos,
            'email'     => $request->email,
            'telefono'     => $request->telefono,
            'programa'     => $request->programa,
            'observacion'     => 'NA',
            'estado'     => 'contactar',
            ]);
            

            return redirect('/')->with('status', 'Datos guardados exitosamente!');

    }

    public function actualizarLead( Request $request ) {
        $lead = Leads::where('id', $request->id)
                        ->update([
                                    'observacion'   => $request->observacion,
                                    'estado'        => 'contactado'
                                ]);
        return $lead;
    }

    public function filtrarLeads( Request $request ) {

        $estados = [
            "contactar" => 'contactar',
            "contactado" => 'contactado'
        ];
        $leads = Leads::Email($request->email)
                        ->Telefono($request->telefono)
                        ->Estado($request->estado)
                        ->get();
        
        return view('home', compact('leads', 'estados'));

    }
}
