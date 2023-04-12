<?php

namespace App\Http\Controllers;

use App\Models\CiudadEmbarque;
use App\Models\Declaracion2022;
use Illuminate\Http\Request;
use App\Models\DeclaracionEcuador;
use App\Models\Mes;
use App\Models\PaisEmbarque;
use App\Models\Regimen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //$declaraciones = DeclaracionEcuador::all();

    // $distritos = $declaraciones->unique('distrito');
    // $transportes = $declaraciones->unique('iva');
    // $paisOrigen = $declaraciones->unique('pais_origen');
    // $incoterm = $declaraciones->unique('incoterm');
    public function index()
    {
        $meses = Mes::all();
        $regimens = Regimen::all();
        $paisEmbarques = PaisEmbarque::all();
        $ciudadEmbarques = CiudadEmbarque::all();
        Session::put('tasks', request()->fullUrl());
        return view('home', compact('meses', 'regimens', 'ciudadEmbarques', 'paisEmbarques'));
    }

    public function back()
    {
        if (session('tasks')) {
            return redirect(session('tasks'))->with('mensaje', 'Bienvenido al buscador de Imporcomex!');
        }
    }

    public function searchProducto(Request $request)
    {
        $term = $request->term;
        $producto = Declaracion2022::where('producto', 'LIKE', "%$term%")
            ->take(15)->get();
        $data = $producto->unique('producto');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->producto . " - " . $value->desc_comer,
                    'id' => $value->producto
                ];
            }
        }
        return $respuesta;
    }

    public function searchMarca(Request $request)
    {
        $term = $request->term;
        $marcas = Declaracion2022::where('marcas', 'LIKE', "%$term%")->take(15)->get();
        $data = $marcas->unique('marcas');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->marcas,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchRuc(Request $request)
    {
        $term = $request->term;
        $ruc = Declaracion2022::where('ruc', 'LIKE', "%$term%")
            ->orWhere('razon_social', 'LIKE', "%$term%")
            ->take(15)->get();
        $data = $ruc->unique('ruc');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->ruc . " - " . $value->razon_social,
                    'id' => $value->ruc
                ];
            }
        }
        return $respuesta;
    }

    public function searchNave(Request $request)
    {
        $term = $request->term;
        $nave = Declaracion2022::where('nave', 'LIKE', "%$term%")->take(15)->get();
        $data = $nave->unique('nave');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->nave,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }
    public function searchTransporte(Request $request)
    {
        $term = $request->term;
        $linea = Declaracion2022::where('linea', 'LIKE', "%$term%")->take(15)->get();
        $data = $linea->unique('linea');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->linea,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }
    public function searchEmbarcadorConsigne(Request $request)
    {
        $term = $request->term;
        $embarcador = Declaracion2022::where('remitente', 'LIKE', "%$term%")->take(15)->get();
        $data = $embarcador->unique('remitente');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->remitente,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchRefrendo(Request $request)
    {
        $term = $request->term;
        $refrendo = Declaracion2022::where('refrendo', 'LIKE', "%$term%")->take(15)->get();
        $data = $refrendo->unique('refrendo');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->refrendo,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchPartidaArancel(Request $request)
    {
        $term = $request->term;
        $sub = Declaracion2022::where('subpartida', 'LIKE', "%$term%")->take(15)->get();
        $data = $sub->unique('subpartida');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->subpartida,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchAgenteAduana(Request $request)
    {
        $term = $request->term;
        $agente = Declaracion2022::where('agente_afianzado', 'LIKE', "%$term%")->take(15)->get();
        $data = $agente->unique('agente_afianzado');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->agente_afianzado,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }
    public function searchAlmacen(Request $request)
    {
        $term = $request->term;
        $almacen = Declaracion2022::where('dep_comercial', 'LIKE', "%$term%")->take(15)->get();
        $data = $almacen->unique('dep_comercial');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->dep_comercial,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchAduana(Request $request)
    {

        $term = $request->term;
        $distritos = Declaracion2022::where('distrito', 'LIKE', "%$term%")->take(15)->get();
        $data = $distritos->unique('distrito');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->distrito,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }
    public function searchVia(Request $request)
    {

        $term = $request->term;
        $via = Declaracion2022::where('via', 'LIKE', "%$term%")->take(15)->get();
        $data = $via->unique('via');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->via,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }
    public function searchPaisOrigen(Request $request)
    {

        $term = $request->term;
        $pais = Declaracion2022::where('pais_origen', 'LIKE', "%$term%")->take(15)->get();
        $data = $pais->unique('pais_origen');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->pais_origen,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchIncoterm(Request $request)
    {

        $term = $request->term;
        $pais = Declaracion2022::where('incoterm', 'LIKE', "%$term%")->take(15)->get();
        $data = $pais->unique('incoterm');
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->incoterm,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function store(Request $request)
    {
        return redirect('home') > with('mensaje', 'Bien venido!');
    }
}
