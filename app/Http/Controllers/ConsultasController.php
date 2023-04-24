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
use App\Models\Declaracion22Export;
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
        if ($request->input('operacion') == 'import') {
            if ($request->input('periodo') == '2023') {
                $tabla = "declaracion22Import";
                $data = $this->declaracion23($request->all());
            } else {
                $tabla = "declaracion22Import";
                $data = $this->declaracion22Import($request->all(),$tabla);
            }
            
        }
        if ($request->input('operacion') == 'export') {
            if ($request->input('periodo') == '2023') {
                $tabla = "declaracion22Import";
                $data = $this->declaracion23($request->all());
            } else {
                $tabla = "declaracion22Export";
                $data = $this->declaracion22Export($request->all(),$tabla);
            }
            
        }
        
        return view('result.index',compact('data'));
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

    public function declaracion_2023($request)
    {
        $data = DeclaracionEcuador::select('ruc','razon_social','producto','marcas','fob_unitario','pais_origen','unidades','subpartida','desc_partida','linea','remitente','ciudad_embarque','pais_embarque','via','kilos_neto','regimen','distrito','bl','fecha_embarque','fecha_llegada','fecha_ingreso','fecha_pago','fecha_salida','periodo','mes','dep_comercial')
            ->rango($request['desde'], $request['hasta'])
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

    public function declaracion22Export($request,$tabla)
    {
        $data =  Declaracion22Export::rango($request['desde'], $request['hasta'])->distrito($request['distrito'])
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

    public function declaracion22Import($request,$tabla)
    {
        $data =  Declaracion22Import::rango($request['desde'], $request['hasta'])->distrito($request['distrito'])
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
