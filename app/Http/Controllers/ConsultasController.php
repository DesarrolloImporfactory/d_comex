<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CiudadEmbarque;
use App\Models\DeclaracionEcuador;
use App\Models\Mes;
use App\Models\PaisEmbarque;
use App\Models\Regimen;
use Illuminate\Support\Facades\DB;
use App\Models\Declaracion2022;
use Yajra\DataTables\DataTables;

class ConsultasController extends Controller
{

    public function index(Request $request)
    {
    }


    public function create(Request $request)
    {
        $request->validate([
            'periodo' => ['required'],
        ]);
        if ($request->input('periodo') == '2023') {
            $data = $this->declaracion23($request->all());
        } else {
            $data = $this->declaracion22($request->all());
        }
    }

    public function declaracion_2023($request)
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
            ->get();
        return $data;
    }

    public function declaracion_2022($request)
    {
        $data = Declaracion2022::rango($request['desde'], $request['hasta'])->distrito($request['distrito'])
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
            ->paginate(10);
        return $data;
    }
    public function declaracion23($request)
    {
        $data = DB::select(
            'CALL declaraciones2023(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $request['desde'], $request['hasta'], $request['distrito'], $request['iva'],
                $request['pais_origen'], $request['pais_embarque'], $request['ciudad_embarque'],
                $request['regimen'], $request['incoterm'], $request['producto'], $request['marca'],
                $request['arancelDesc'], $request['ruc'], $request['linea'], $request['embarcador'],
                $request['refrendo'], $request['agente_afianzado'], $request['almacen']
            ]
        );
        return $data;
    }

    public function declaracion22($request)
    {
        $data = DB::select(
            'CALL declaraciones2022(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
            [
                $request['desde'], $request['hasta'], $request['distrito'], $request['iva'],
                $request['pais_origen'], $request['pais_embarque'], $request['ciudad_embarque'],
                $request['regimen'], $request['incoterm'], $request['producto'], $request['marca'],
                $request['arancelDesc'], $request['ruc'], $request['linea'], $request['embarcador'],
                $request['refrendo'], $request['agente_afianzado'], $request['almacen']
            ]
        );
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
