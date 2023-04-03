<?php

namespace App\Http\Controllers;

use App\Models\CiudadEmbarque;
use Illuminate\Http\Request;
use App\Models\DeclaracionEcuador;
use App\Models\Mes;
use App\Models\PaisEmbarque;
use App\Models\Regimen;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$declaraciones = DeclaracionEcuador::all();

        // $distritos = $declaraciones->unique('distrito');
        // $transportes = $declaraciones->unique('iva');
        // $paisOrigen = $declaraciones->unique('pais_origen');
        // $incoterm = $declaraciones->unique('incoterm');
        $meses = Mes::all();
        $regimens = Regimen::all();
        $paisEmbarques = PaisEmbarque::all();
        $ciudadEmbarques = CiudadEmbarque::all();
        Session::put('tasks', request()->fullUrl());
        return view('home', compact('meses', 'regimens', 'ciudadEmbarques', 'paisEmbarques'));
        // return view('home',compact('meses','regimens','ciudadEmbarques','paisEmbarques','distritos','transportes','paisOrigen','incoterm'));
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
        $producto = DeclaracionEcuador::where('producto', 'LIKE', "%$term%")
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
        $marcas = DeclaracionEcuador::where('marcas', 'LIKE', "%$term%")->take(15)->get();
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
        $ruc = DeclaracionEcuador::where('ruc', 'LIKE', "%$term%")
            ->orWhere('razon_social', 'LIKE', "%$term%")
            ->take(7)->get();
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
        $nave = DeclaracionEcuador::where('nave', 'LIKE', "%$term%")->take(7)->get();
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
        $linea = DeclaracionEcuador::where('linea', 'LIKE', "%$term%")->take(7)->get();
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
        $embarcador = DeclaracionEcuador::where('remitente', 'LIKE', "%$term%")->take(7)->get();
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
        $refrendo = DeclaracionEcuador::where('refrendo', 'LIKE', "%$term%")->take(7)->get();
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
        $sub = DeclaracionEcuador::where('subpartida', 'LIKE', "%$term%")->take(7)->get();
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
        $agente = DeclaracionEcuador::where('agente_afianzado', 'LIKE', "%$term%")->take(7)->get();
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
        $almacen = DeclaracionEcuador::where('dep_comercial', 'LIKE', "%$term%")->take(7)->get();
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
        $distritos = DeclaracionEcuador::where('distrito', 'LIKE', "%$term%")->take(7)->get();
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
        $via = DeclaracionEcuador::where('via', 'LIKE', "%$term%")->take(7)->get();
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
        $pais = DeclaracionEcuador::where('pais_origen', 'LIKE', "%$term%")->take(7)->get();
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
        $pais = DeclaracionEcuador::where('incoterm', 'LIKE', "%$term%")->take(7)->get();
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
