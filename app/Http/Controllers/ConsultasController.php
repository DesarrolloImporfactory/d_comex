<?php

namespace App\Http\Controllers;

use App\Models\Declaracion2022;
use Illuminate\Http\Request;
use App\Models\DeclaracionEcuador;
use App\Models\Declaracion22Import;
use App\Models\Decreto;

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
        $count = $this->request($data);

        if ($count >= 50000) {
            return redirect()->route('home')->with('alert', 'true');
        } else {
            return view('result.view', compact('data', 'count'));
        }
    }

    public function request($request)
    {
        $new = [
            "operacion" => $request['operacion'] ?? '',
            "periodo" => $request['periodo'] ?? '',
            "desde" => $request['desde'] ?? '',
            "hasta" => $request['hasta'] ?? '',
            "producto" => $request['producto'] ?? '',
            "marca" => $request['marca'] ?? '',
            "arancelDesc" => $request['arancelDesc'] ?? '',
            "ruc" => $request['ruc'] ?? '',
            "nave" => $request['nave'] ?? '',
            "linea" => $request['linea'] ?? '',
            "embarcador" => $request['embarcador'] ?? '',
            "refrendo" => $request['refrendo'] ?? '',
            "agente_afianzado" => $request['agente_afianzado'] ?? '',
            "almacen" => $request['almacen'] ?? '',
            "distrito" => $request['distrito'] ?? '',
            "iva" => $request['iva'] ?? '',
            "pais_origen" => $request['pais_origen'] ?? '',
            "pais_embarque" => $request['pais_embarque'] ?? '',
            "ciudad_embarque" => $request['ciudad_embarque'] ?? '',
            "regimen" => $request['regimen'] ?? '',
            "incoterm" => $request['incoterm'] ?? '',
        ];

        if ($request['periodo'] == '2024') {
            $count = $this->declaracion24($new);
        } else if ($request['periodo'] == '2023') {
            $count = $this->declaracion23($new);
        } else {
            $count = $this->declaracion22($new);
        }
        return $count;
    }

    public function declaracion24($request)
    {
        $data = Decreto::rango($request['desde'], $request['hasta'])
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

    public function store(Request $request) {}


    public function show(Request $request, $id) {}


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
