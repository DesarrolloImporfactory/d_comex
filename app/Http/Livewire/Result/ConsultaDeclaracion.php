<?php

namespace App\Http\Livewire\Result;

use Livewire\Component;
use App\Models\DeclaracionEcuador;
use Illuminate\Support\Facades\DB;

class ConsultaDeclaracion extends Component
{
    public $datos;
    public $consulta;
    public function mount($datos)
    {
        $this->datos = $datos;
    }
    public function declaracion_2023($request)
    {
        // $resultados = DB::table('declaraciones')
        //     ->select('pais', DB::raw('COUNT(*) as cantidad_declaraciones'))
        //     ->groupBy('pais')
        //     ->get();

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
            ->select('pais_origen', DB::raw('COUNT(*) as cantidad_declaraciones'))
            ->almacen($request['almacen'])
            ->groupBy('pais_origen')
            ->get();
        return $data;
    }
    public function render()
    {
        $array = [];
        $data = $this->declaracion_2023($this->datos);
        // $this->consulta = $data;
        foreach ($data as $consulta) {
            $array['label'][] = $consulta->pais_origen;
            $array['data'][] = $consulta->cantidad_declaraciones;
        }

        $datos = [
            'data' => $array['data'] = json_encode($array),
        ];
        return view('livewire.result.consulta-declaracion',$datos);
    }
}
