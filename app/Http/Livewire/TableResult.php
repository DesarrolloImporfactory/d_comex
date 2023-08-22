<?php

namespace App\Http\Livewire;

use App\Models\Declaracion2021;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DeclaracionEcuador;
use App\Models\Declaracion2022;
use App\Models\Suscripcion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TableResult extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchAll = "";
    public $searchEmbarcador, $searchRuc = "", $searchProducto, $searchMarca,
        $searchPartida, $searchTransporte, $searchVia, $searchDistrito,  $searchAlmacen, $acumulador, $importador = "", $productos = "", $proveedores = "";
    public $readi = false;
    public $perPage = '5';
    public $datos;
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
    public $searchMes;


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

    public function updatingSearchAll()
    {
        $this->resetPage();
    }

    public function render()
    {
        ini_set('memory_limit', '1024M');
        set_time_limit(3000000);
        if ($this->periodo == "2022") {
            $consulta = $this->declaracion22();
            $select = $this->declaracion22();
        } elseif ($this->periodo == "2023") {
            $consulta = $this->declaracion23();
            $select = $this->declaracion23();
        } else {
            $consulta = $this->declaracion21();
            $select = $this->declaracion21();
        }

        $valor = $this->searchAll;
        if (strlen($this->searchAll) > 1) {
            $consulta->where(function ($query) use ($valor) {
                $query->where('ruc', 'LIKE', "%$valor%")
                    ->orWhere('fob_unitario', 'LIKE', "%$valor%")
                    ->orWhere('remitente', 'LIKE', "%$valor%")
                    ->orWhere('producto', 'LIKE', "%$valor%")
                    ->orWhere('pais_embarque', 'LIKE', "%$valor%")
                    ->orWhere('ciudad_embarque', 'LIKE', "%$valor%")
                    ->orWhere('kilos_neto', 'LIKE', "%$valor%");
            });
        }

        if (strlen($this->searchEmbarcador) > 1) {
            $remi = $this->searchEmbarcador;
            $consulta->where(function ($query) use ($remi) {
                $query->where('remitente', $remi);
            });
        }
        if (strlen($this->searchRuc) > 1) {
            $rc = $this->searchRuc;
            $consulta->where(function ($query) use ($rc) {
                $query->where('ruc', $rc);
            });
        }
        if (strlen($this->searchProducto) > 1) {
            $pro = $this->searchProducto;
            $consulta->where(function ($query) use ($pro) {
                $query->where('producto', $pro);
            });
        }
        if (strlen($this->searchMarca) > 1) {
            $marca = $this->searchMarca;
            $consulta->where(function ($query) use ($marca) {
                $query->where('marcas', 'LIKE', "%$marca%");
            });
        }
        if (strlen($this->searchPartida) > 1) {
            $partida = $this->searchPartida;
            $consulta->where(function ($query) use ($partida) {
                $query->where('subpartida', 'LIKE', "%$partida%");
            });
        }
        if (strlen($this->searchTransporte) > 1) {
            $linea = $this->searchTransporte;
            $consulta->where(function ($query) use ($linea) {
                $query->where('linea', 'LIKE', "%$linea%");
            });
        }
        if (strlen($this->searchVia) > 1) {
            $via = $this->searchVia;
            $consulta->where(function ($query) use ($via) {
                $query->where('via', 'LIKE', "%$via%");
            });
        }
        if (strlen($this->searchDistrito) > 1) {
            $distrito = $this->searchDistrito;
            $consulta->where(function ($query) use ($distrito) {
                $query->where('distrito', 'LIKE', "%$distrito%");
            });
        }
        if (strlen($this->searchMes) > 0) {
            $mes = $this->searchMes;
            $consulta->where(function ($query) use ($mes) {
                $query->where('mes', $mes);
            });
        } else {
            $this->searchMes = "";
        }
        if (strlen($this->searchAlmacen) > 1) {
            $dep = $this->searchAlmacen;
            $consulta->where(function ($query) use ($dep) {
                $query->where('dep_comercial', 'LIKE', "%$dep%");
            });
        }

        $via = $select->select('via')->get();
        $mes = $select->select('mes')->get();

        $vias = $via->unique('via');
        $meses = $mes->unique('mes');

        $data = $consulta->paginate($this->perPage);
        // $this->acumulador = count($select->select('id')->get());
        // $acum = $this->acumulador;
        return view('livewire.table-result', compact('data', 'vias', 'meses'));
    }

    public function importador()
    {
        if ($this->periodo == "2022") {
            $select = $this->declaracion22();
        } elseif ($this->periodo == "2023") {
            $select = $this->declaracion23();
        } else {
            $select = $this->declaracion21();
        }

        $ruc = $select->select('ruc')->get();
        $this->importador = $ruc->unique('ruc');
    }
    public function producto()
    {
        if ($this->periodo == "2022") {
            $select = $this->declaracion22();
        } elseif ($this->periodo == "2023") {
            $select = $this->declaracion23();
        } else {
            $select = $this->declaracion21();
        }

        $producto = $select->select('producto')->get();
        $this->productos = $producto->unique('producto');
    }

    public function embarcador()
    {
        if ($this->periodo == "2022") {
            $select = $this->declaracion22();
        } elseif ($this->periodo == "2023") {
            $select = $this->declaracion23();
        } else {
            $select = $this->declaracion21();
        }

        $proveedor = $select->select('remitente')->get();
        $this->proveedores = $proveedor->unique('remitente');
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

    public function declaracion22()
    {
        $data =  Declaracion2022::operacion($this->operacion($this->operacion))->rango($this->desde, $this->hasta)
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
            ->almacen($this->almacen);

        return $data;
    }

    public function excel(String $tipo)
    {
        $usuario = Auth::user();
        $tipoSuscripcion = Suscripcion::where('estado', 'Activa')->where('usuario_id', $usuario->id)
            ->where('tipo_id', '3')->first();
        if (isset($tipoSuscripcion)) {
            $this->emit('alert', 'La suscripción demo no esta permitida para este tipo de acción.');
        } else {
            ini_set('memory_limit', '1024M');
            set_time_limit(3000000);
            $time = new Carbon();
            if ($this->periodo == "2022") {
                return $this->export22($tipo, $time);
            } elseif ($this->periodo == "2023") {
                return $this->export23($tipo, $time);
            } else {
                return $this->export21($tipo, $time);
            }
        }
    }

    public function export22($tipo, $time)
    {

        $handle = fopen(public_path('storage/' . $time . 'export.csv'), 'w');
        $columnas = Declaracion2022::query()->first()->getConnection()->getSchemaBuilder()->getColumnListing('declaracion2022s');

        if ($tipo == 'csv') {
            fputcsv($handle, $columnas,);
            Declaracion2022::query()
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
                ->almacen($this->almacen)->operacion($this->operacion($this->operacion))->mes($this->searchMes)->rango($this->desde, $this->hasta)
                ->lazyById(2000, 'id')
                ->each(function ($consulta) use ($handle) {
                    fputcsv($handle, $consulta->toArray());
                });
        } else {
            $delimitador = ';';
            fputcsv($handle, $columnas, $delimitador);
            Declaracion2022::query()
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
                ->almacen($this->almacen)->operacion($this->operacion($this->operacion))->mes($this->searchMes)->rango($this->desde, $this->hasta)
                ->lazyById(2000, 'id')
                ->each(function ($consulta) use ($handle) {
                    fputcsv($handle, $consulta->toArray(), ';');
                });
        }

        fclose($handle);
        $this->emit('alert', 'Tu archivo esta listo!.');
        return response()->download(public_path('storage/' . $time . 'export.csv'))->deleteFileAfterSend(true);
    }

    public function export23($tipo, $time)
    {
        $handle = fopen(public_path('storage/' . $time . 'export.csv'), 'w');
        $columnas = Declaracion2022::query()->first()->getConnection()->getSchemaBuilder()->getColumnListing('declaracion_ecuadors');
        if ($tipo == 'csv') {
            fputcsv($handle, $columnas);
            DeclaracionEcuador::query()
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
                ->almacen($this->almacen)->operacion($this->operacion($this->operacion))->mes($this->searchMes)->rango($this->desde, $this->hasta)
                ->lazyById(2000, 'id')
                ->each(function ($consulta) use ($handle) {
                    fputcsv($handle, $consulta->toArray());
                });
        } else {
            $delimitador = ';';
            fputcsv($handle, $columnas, $delimitador);
            DeclaracionEcuador::query()
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
                ->almacen($this->almacen)->operacion($this->operacion($this->operacion))->mes($this->searchMes)->rango($this->desde, $this->hasta)
                ->lazyById(2000, 'id')
                ->each(function ($consulta) use ($handle) {
                    fputcsv($handle, $consulta->toArray(), ';');
                });
        }

        fclose($handle);
        $this->emit('alert', 'Tu archivo esta listo!.');
        return response()->download(public_path('storage/' . $time . 'export.csv'))->deleteFileAfterSend(true);
    }

    public function export21($tipo, $time)
    {
        $handle = fopen(public_path('storage/' . $time . 'export.csv'), 'w');
        $columnas = Declaracion2021::query()->first()->getConnection()->getSchemaBuilder()->getColumnListing('declaracion_ecuadors');
        if ($tipo == 'csv') {
            fputcsv($handle, $columnas);
            Declaracion2021::query()
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
                ->almacen($this->almacen)->operacion($this->operacion($this->operacion))->mes($this->searchMes)->rango($this->desde, $this->hasta)
                ->lazyById(2000, 'id')
                ->each(function ($consulta) use ($handle) {
                    fputcsv($handle, $consulta->toArray());
                });
        } else {
            $delimitador = ';';
            fputcsv($handle, $columnas, $delimitador);
            Declaracion2021::query()
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
                ->almacen($this->almacen)->operacion($this->operacion($this->operacion))->mes($this->searchMes)->rango($this->desde, $this->hasta)
                ->lazyById(2000, 'id')
                ->each(function ($consulta) use ($handle) {
                    fputcsv($handle, $consulta->toArray(), ';');
                });
        }

        fclose($handle);
        $this->emit('alert', 'Tu archivo esta listo!.');
        return response()->download(public_path('storage/' . $time . 'export.csv'))->deleteFileAfterSend(true);
    }


    public function declaracion23()
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
            ->almacen($this->almacen);
        return $data;
    }

    public function declaracion21()
    {
        $data = Declaracion2021::operacion($this->operacion($this->operacion))->rango($this->desde, $this->hasta)
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
            ->almacen($this->almacen);
        return $data;
    }

    public function limpiar()
    {
        $this->reset([
            'searchMes',
            'searchRuc',
            'searchProducto',
            'searchMarca',
            'searchPartida',
            'searchTransporte',
            'searchEmbarcador',
            'searchVia',
            'searchDistrito',
            'searchMes',
            'searchAlmacen',
            'searchAll',
        ]);
    }
}
