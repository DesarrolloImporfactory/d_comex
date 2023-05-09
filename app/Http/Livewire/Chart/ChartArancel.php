<?php

namespace App\Http\Livewire\Chart;

use Livewire\Component;
use App\Models\DeclaracionEcuador;
use Illuminate\Support\Facades\DB;
use App\Models\Declaracion2022;

class ChartArancel extends Component
{
    public $datos;
    public $consulta;
    public $periodo = "";

    public function render()
    {
        $array = [];
        $request = $this->datos;
        $this->periodo = $request['periodo'] ;
        if ($request['periodo'] == 2023) {
            $data = $this->declaracion_2023($this->datos);
        } else {
            $data = $this->declaracion_2022($this->datos);
        }
        
        foreach ($data as $consulta) {
            $array[]=[
                'name'=>$consulta['subpartida'],
                'y'=>$consulta['cantidad_declaraciones']
            ];
        }

        $chart = json_encode($array);

        return view('livewire.chart.chart-arancel',compact('chart'));
    }

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
            ->select('subpartida', DB::raw('COUNT(*) as cantidad_declaraciones'))
            ->groupBy('subpartida')
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
            ->select('subpartida', DB::raw('COUNT(*) as cantidad_declaraciones'))
            ->groupBy('subpartida')
            ->get();
        return $data;
    }
}
