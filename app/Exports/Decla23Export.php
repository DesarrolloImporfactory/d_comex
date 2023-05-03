<?php

namespace App\Exports;

use App\Models\DeclaracionEcuador;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class Decla23Export implements FromQuery, WithChunkReading
{
    use Exportable;

    private $desde = " ";
    private $hasta = " ";
    private $distrito = " ";
    private $iva = " ";
    private $pais_origen = " ";
    private $pais_embarque = " ";
    private $ciudad_embarque = " ";
    private $regimen = " ";
    private $incoterm = " ";
    private $producto = " ";
    private $marca = " ";
    private $arancelDesc = " ";
    private $ruc = " ";
    private $linea = " ";
    private $embarcador = " ";
    private $refrendo = " ";
    private $agente_afianzado = " ";
    private $almacen = " ";
    private $periodo = " ";
    private $searchMes;
    public $operacion = " ";

    public function __construct(String $desde, $hasta, $distrito, $iva, $pais_origen, $pais_embarque, $ciudad_embarque, $regimen, $incoterm, $producto, $marca, $arancelDesc, $ruc, $linea, $embarcador, $refrendo, $agente_afianzado, $almacen, $searchMes,$operacion)
    {
        $this->desde = $desde ?? '';
        $this->hasta = $hasta ?? '';
        $this->distrito = $distrito ?? '';
        $this->iva = $iva ?? '';
        $this->pais_origen = $pais_origen ?? '';
        $this->pais_embarque = $pais_embarque ?? '';
        $this->ciudad_embarque = $ciudad_embarque ?? '';
        $this->regimen = $regimen ?? '';
        $this->incoterm = $incoterm ?? '';
        $this->producto = $producto ?? '';
        $this->marca = $marca ?? '';
        $this->arancelDesc = $arancelDesc ?? '';
        $this->ruc = $ruc ?? '';
        $this->linea = $linea ?? '';
        $this->embarcador = $embarcador ?? '';
        $this->refrendo = $refrendo ?? '';
        $this->agente_afianzado = $agente_afianzado ?? '';
        $this->almacen = $almacen ?? '';
        $this->periodo = $periodo ?? '';
        $this->searchMes = $searchMes ?? '';
        $this->operacion = $operacion ?? '';
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
    public function query()
    {
        return DeclaracionEcuador::query()
            ->when($this->producto, function ($query) {
                $query->distrito($this->distrito)
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
                    ->almacen($this->almacen)->operacion($this->operacion($this->operacion))->mes($this->searchMes)->rango($this->desde, $this->hasta);
            });
    }
    public function chunkSize(): int
    {
        return 100;
    }
}
