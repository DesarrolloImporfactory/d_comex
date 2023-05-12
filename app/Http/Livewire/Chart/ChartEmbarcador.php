<?php

namespace App\Http\Livewire\Chart;

use Livewire\Component;
use App\Models\DeclaracionEcuador;
use Illuminate\Support\Facades\DB;
use App\Models\Declaracion2022;

class ChartEmbarcador extends Component
{
    public $datos;
    public $consulta;
    public $periodo = "";

    public function mount($datos)
    {
        $this->datos = $datos;
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
            ->select('remitente', DB::raw('COUNT(*) as cantidad_declaraciones'))
            ->groupBy('remitente')
            ->get();
        return $data;
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
            ->select('remitente', DB::raw('COUNT(*) as cantidad_declaraciones'))
            ->groupBy('remitente')
            ->get();
        return $data;
    }
    public function render()
    {
        $array = [];
        $request = $this->datos;
        $this->periodo = $request['periodo'] ;
        if ($request['periodo'] == 2023) {
            $data = $this->declaracion_2023($this->datos);
            $tabla = $this->declaracion23($this->datos);
        } else {
            $data = $this->declaracion_2022($this->datos);
            $tabla = $this->declaracion22($this->datos);
        }
        
        foreach ($data as $consulta) {
            $array[]=[
                'name'=>$consulta['remitente'],
                'y'=>$consulta['cantidad_declaraciones']
            ];
        }

        $chart = json_encode($array);
        return view('livewire.chart.chart-embarcador',compact('chart','tabla'));
    }
    public function declaracion22($request)
    {

        $data = Declaracion2022::select('remitente', DB::raw('COUNT(*) as cantidad_declaraciones'), DB::raw('SUM(fob) as total_fob'), DB::raw('SUM(cif) as total_cif'))
            ->operacion($this->operacion($request['operacion']))
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
            ->groupBy('remitente')
            ->get();
        return $data;
    }

    public function declaracion23($request)
    {

        $data = DeclaracionEcuador::select('remitente', DB::raw('COUNT(*) as cantidad_declaraciones'), DB::raw('SUM(fob) as total_fob'), DB::raw('SUM(cif) as total_cif'))
            ->operacion($this->operacion($request['operacion']))
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
            ->groupBy('remitente')
            ->get();
        return $data;
    }
    public function operacion($operacion)
    {
        if ($operacion == 'import') {
            $op = ['IMP.GRAL.', 'IMP.SMPL.'];
        } else {
            $op = ['EXP.SMPL.', 'EXP.GRAL.'];
        }
        return $op;
    }
}
