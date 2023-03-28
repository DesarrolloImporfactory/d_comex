<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CiudadEmbarque;
use App\Models\DeclaracionEcuador;
use App\Models\Mes;
use App\Models\PaisEmbarque;
use App\Models\Regimen;
use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{

    public function index()
    {
        return view('result.index');
    }


    public function create(Request $request)
    {
        $request->except('_token');
        $data = DeclaracionEcuador::where('producto', $request->input('producto'))->distrito($request->input('distrito'))
            ->orWhere('marca', $request->input('marca'))->iva($request->input('iva'))
            ->orWhere('subpartida', $request->input('arancelDesc'))->origen($request->input('pais_origen'))
            ->orWhere('ruc', $request->input('ruc'))->embarque($request->input('pais_embarque'))
            ->ciudad($request->input('ciudad_embarque'))
            ->regimen($request->input('regimen'))
            ->incoterm($request->input('incoterm'))
            ->orWhere('linea', $request->input('linea'))
            ->orWhere('embarcador_consigne', $request->input('embarcador'))
            ->orWhere('refrendo', $request->input('refrendo'))
            ->orWhere('agente_afianzado', $request->input('agente_afianzado'))
            ->orWhere('dep_comercial', $request->input('almacen'))
            ->get();
        
        return view('result.index',compact('data'));
    }


    public function store(Request $request)
    {
        
    }


    public function show(Request $request,$id)
    {
        
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
