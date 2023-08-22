<?php

namespace App\Http\Livewire\Chart;

use Livewire\Component;
use App\Models\DeclaracionEcuador;
use Illuminate\Support\Facades\DB;
use App\Models\Declaracion2022;
use Livewire\WithPagination;

class ChartEmbarcador extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $datos;
    public $consulta;
    public $desde = " ";
    public $hasta = " ";
    public $distrito = " ";
    public $iva = " ";
    public $pais_origen = " ";
    public $pais_embarque = " ";
    public $ciudad_embarque = " ";
    public $regimen = " ";
    public $incoterm = " ";
    public $producto = " ";
    public $marca = " ";
    public $arancelDesc = " ";
    public $ruc = " ";
    public $linea = " ";
    public $embarcador = " ";
    public $refrendo = " ";
    public $agente_afianzado = " ";
    public $almacen = " ";
    public $periodo = " ";
    public $operacion = " ";

    public function mount($datos)
    {
        $this->datos = $datos;
        $query = $this->datos;

        $this->desde = $query['desde'] ?? '';
        $this->hasta = $query['hasta'] ?? '';
        $this->distrito = $query['distrito'] ?? '';
        $this->iva = $query['iva'] ?? '';
        $this->pais_origen = $query['pais_origen'] ?? '';
        $this->pais_embarque = $query['pais_embarque'] ?? '';
        $this->ciudad_embarque = $query['ciudad_embarque'] ?? '';
        $this->regimen = $query['regimen'] ?? '';
        $this->incoterm = $query['incoterm'] ?? '';
        $this->producto = $query['producto'] ?? '';
        $this->marca = $query['marca'] ?? '';
        $this->arancelDesc = $query['arancelDesc'] ?? '';
        $this->ruc = $query['ruc'] ?? '';
        $this->linea = $query['linea'] ?? '';
        $this->embarcador = $query['embarcador'] ?? '';
        $this->refrendo = $query['refrendo'] ?? '';
        $this->agente_afianzado = $query['agente_afianzado'] ?? '';
        $this->almacen = $query['almacen'] ?? '';
        $this->periodo = $query['periodo'] ?? '';
        $this->operacion = $query['operacion'] ?? '';
    }
    public function declaracion_2022($request)
    {
        $data = Declaracion2022::operacion($this->operacion($this->operacion))->rango($this->desde, $this->hasta)->distrito($this->distrito)
            ->iva($this->iva)
            ->origen($this->pais_origen)
            ->embarque($this->pais_embarque)
            ->ciudad($this->ciudad_embarque)
            ->regimen($this->regimen)
            ->incoterm($this->incoterm)
            ->producto($this->producto)
            ->marca($this->marca)
            ->subPartida($this->arancelDesc)
            ->ruc($this->ruc)
            ->linea($this->linea)
            ->embarcador($this->embarcador)
            ->refrendo($this->refrendo)
            ->agenteAfianzado($this->agente_afianzado)
            ->almacen($this->almacen)
            ->select('remitente', DB::raw('COUNT(*) as cantidad_declaraciones'))
            ->groupBy('remitente')
            ->get();
        return $data;
    }
    public function declaracion_2023($request)
    {

        $data = DeclaracionEcuador::operacion($this->operacion($this->operacion))->rango($this->desde, $this->hasta)
        ->distrito($this->distrito)
        ->iva($this->iva)
        ->origen($this->pais_origen)
        ->embarque($this->pais_embarque)
        ->ciudad($this->ciudad_embarque)
        ->regimen($this->regimen)
        ->incoterm($this->incoterm)
        ->producto($this->producto)
        ->marca($this->marca)
        ->subPartida($this->arancelDesc)
        ->ruc($this->ruc)
        ->linea($this->linea)
        ->embarcador($this->embarcador)
        ->refrendo($this->refrendo)
        ->agenteAfianzado($this->agente_afianzado)
        ->almacen($this->almacen)
        ->select('remitente', DB::raw('COUNT(*) as cantidad_declaraciones'))
        ->groupBy('remitente')
        ->get();
    return $data;
    }
    public function render()
    {
        $array = [];
        $request = $this->datos;
        if ($this->periodo == 2023) {
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
        ->operacion($this->operacion($this->operacion))
        ->rango($this->desde, $this->hasta)
        ->distrito($this->distrito)
        ->iva($this->iva)
        ->origen($this->pais_origen)
        ->embarque($this->pais_embarque)
        ->ciudad($this->ciudad_embarque)
        ->regimen($this->regimen)
        ->incoterm($this->incoterm)
        ->producto($this->producto)
        ->marca($this->marca)
        ->subPartida($this->arancelDesc)
        ->ruc($this->ruc)
        ->linea($this->linea)
        ->embarcador($this->embarcador)
        ->refrendo($this->refrendo)
        ->agenteAfianzado($this->agente_afianzado)
        ->almacen($this->almacen)
        ->groupBy('remitente')
        ->orderBy('total_fob', 'desc')
        ->paginate(5);
    return $data;
    }

    public function declaracion23($request)
    {

        $data = DeclaracionEcuador::select('remitente', DB::raw('COUNT(*) as cantidad_declaraciones'), DB::raw('SUM(fob) as total_fob'), DB::raw('SUM(cif) as total_cif'))
            ->operacion($this->operacion($this->operacion))
            ->rango($this->desde, $this->hasta)
            ->distrito($this->distrito)
            ->iva($this->iva)
            ->origen($this->pais_origen)
            ->embarque($this->pais_embarque)
            ->ciudad($this->ciudad_embarque)
            ->regimen($this->regimen)
            ->incoterm($this->incoterm)
            ->producto($this->producto)
            ->marca($this->marca)
            ->subPartida($this->arancelDesc)
            ->ruc($this->ruc)
            ->linea($this->linea)
            ->embarcador($this->embarcador)
            ->refrendo($this->refrendo)
            ->agenteAfianzado($this->agente_afianzado)
            ->almacen($this->almacen)
            ->groupBy('remitente')
            ->orderBy('total_fob', 'desc')
            ->paginate(5);
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
