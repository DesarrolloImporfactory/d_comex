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
        $data = DeclaracionEcuador::distrito($request->input('distrito'))
            ->iva($request->input('iva'))
            ->origen($request->input('pais_origen'))
            ->embarque($request->input('pais_embarque'))
            ->ciudad($request->input('ciudad_embarque'))
            ->regimen($request->input('regimen'))
            ->incoterm($request->input('incoterm'))
            ->producto($request->input('producto'))
            ->marca($request->input('marca'))
            ->subPartida($request->input('arancelDesc'))
            ->ruc($request->input('ruc'))
            ->linea($request->input('linea'))
            ->embarcador($request->input('embarcador'))
            ->refrendo($request->input('refrendo'))
            ->agenteAfianzado($request->input('agente_afianzado'))
            ->almacen($request->input('almacen'))
            ->get();

        return view('result.index', compact('data'));
        // return $request->all();
    }


    public function store(Request $request)
    {
    }


    public function show(Request $request, $id)
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
