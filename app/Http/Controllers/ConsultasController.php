<?php

namespace App\Http\Controllers;

use App\Models\Declaracion2022;
use Illuminate\Http\Request;
use App\Models\DeclaracionEcuador;
use App\Models\Declaracion22Import;

class ConsultasController extends Controller
{

    public function index()
    {
        return view('result.index');
    }


    public function create(Request $request)
    {
        $request->validate([
            'periodo' => ['required'],
            'operacion' => ['required'],
        ]);
        $data = $request->except('_token');

        if($request->input('periodo') == '2023'){
            $count = $this->declaracion23($data);
        }else{
            $count = $this->declaracion22($data);
        }

        if ($count >= 50000) {
            return redirect()->route('home')->with('alert','true');
        } else {
            return view('result.view', compact('data','count'));
        }
        
    }


    public function declaracion23($request)
    {
        $data = DeclaracionEcuador::rango($request['desde'], $request['hasta'])
            ->distrito($request['distrito'])
            ->iva($request['iva'])
            ->origen($request['pais_origen'])
            ->embarque($request['pais_embarque'])
            ->ciudad($request['ciudad_embarque'])
            ->regimen($request['regimen'])
            ->incoterm($request['incoterm'])
            ->producto($request['producto'])
            ->marca($request['marca'])
            ->subPartida($request['arancelDesc'])
            ->ruc($request['ruc'])
            ->linea($request['linea'])
            ->embarcador($request['embarcador'])
            ->refrendo($request['refrendo'])
            ->agenteAfianzado($request['agente_afianzado'])
            ->almacen($request['almacen'])
            ->count();
        return $data;
    }


    public function declaracion22($request)
    {
        $data =  Declaracion2022::rango($request['desde'], $request['hasta'])
            ->distrito($request['distrito'])
            ->iva($request['iva'])
            ->origen($request['pais_origen'])
            ->embarque($request['pais_embarque'])
            ->ciudad($request['ciudad_embarque'])
            ->regimen($request['regimen'])
            ->incoterm($request['incoterm'])
            ->producto($request['producto'])
            ->marca($request['marca'])
            ->subPartida($request['arancelDesc'])
            ->ruc($request['ruc'])
            ->linea($request['linea'])
            ->embarcador($request['embarcador'])
            ->refrendo($request['refrendo'])
            ->agenteAfianzado($request['agente_afianzado'])
            ->almacen($request['almacen'])
            ->count();
        return $data;
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
