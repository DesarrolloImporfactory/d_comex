<?php

namespace App\Http\Livewire\Result;

use Livewire\Component;
use App\Models\DeclaracionEcuador;
use Illuminate\Support\Facades\DB;
use App\Models\Declaracion2022;
use App\Models\Decreto;

class ChartRemitente extends Component
{
    public $datos;
    public $consulta;

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
            ->select('pais_origen', DB::raw('COUNT(*) as cantidad_declaraciones'))
            ->groupBy('pais_origen')
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
    public function declaracion_2024($request)
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
            ->select('remitente', DB::raw('COUNT(*) as cantidad_declaraciones'))
            ->groupBy('remitente')
            ->get();
        return $data;
    }
    public function render()
    {
        $array = [];
        $request = $this->datos;
        if ($request['periodo'] == 2024) {
            $data = $this->declaracion_2024($this->datos);
        } else
        if ($request['periodo'] == 2023) {
            $data = $this->declaracion_2023($this->datos);
        } else {
            $data = $this->declaracion_2022($this->datos);
        }

        foreach ($data as $consulta) {
            $array['label'][] = $consulta->remitente;
            $array['data'][] = $consulta->cantidad_declaraciones;
        }

        $datos = [
            'data' => $array['data'] = json_encode($array),
        ];
        return view('livewire.result.chart-remitente', $datos);
    }
}
