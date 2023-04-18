<?php

namespace App\Http\Controllers;

use App\Models\CiudadEmbarque;
use App\Models\Declaracion2022;
use Illuminate\Http\Request;
use App\Models\DeclaracionEcuador;
use App\Models\Mes;
use App\Models\Nave;
use App\Models\Embarcador;
use App\Models\Transporte;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\Refrendo;
use App\Models\Subpartida;
use App\Models\RucImportador;
use App\Models\PaisEmbarque;
use App\Models\Regimen;
use App\Models\Agente;
use App\Models\Almacen;
use App\Models\Aduana;
use App\Models\Via;
use App\Models\Pais;
use App\Models\Incoterm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $meses = Mes::all();
        $regimens = Regimen::all();
        $paisEmbarques = PaisEmbarque::all();
        $ciudadEmbarques = CiudadEmbarque::all();
        $aduanas = Aduana:: all();
        $vias = Via:: all();
        $paises = Pais:: all();
        $incoterms = Incoterm:: all();
        Session::put('tasks', request()->fullUrl());
        return view('home', compact('meses', 'regimens', 'ciudadEmbarques', 'paisEmbarques','aduanas','vias','paises','incoterms'));
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
        $data = Producto::select('producto','descripcion')->distinct('producto')->where('producto', 'LIKE', "%$term%")
            ->take(20)->get();

        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->producto . " - " . $value->descripcion,
                    'id' => $value->producto
                ];
            }
        }
        return $respuesta;
    }

    public function searchMarca(Request $request)
    {
        $term = $request->term;
        $data = Marca::select('marca')->where('marca', 'LIKE', "%$term%")->take(20)->get();
        
        if (count($data) == 0) {
            $respuesta[] = "No existen coincidencias";
        } else {
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->marca,
                    'id' => $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchRuc(Request $request)
    {
        $term = $request->term;
        $data = RucImportador::distinct('ruc')->where('ruc', 'LIKE', "%$term%")->take(20)->get();
        // $data = Declaracion2022::select('ruc','razon_social')->distinct('ruc')->where('ruc', 'LIKE', "%$term%")->take(20)->get();

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
        $data = Nave::where('nave', 'LIKE', "%$term%")->take(10)->get();
        
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
        $data = Transporte::where('linea', 'LIKE', "%$term%")->take(20)->get();
        
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
        $data = Embarcador::where('remitente', 'LIKE', "%$term%")->take(20)->get();
        
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
        $data = Refrendo::where('refrendo', 'LIKE', "%$term%")->take(20)->get();
        
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
        $data = Subpartida::where('subpartida', 'LIKE', "%$term%")->take(10)->get();
        
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
        $data = Agente::where('agente_afianzado', 'LIKE', "%$term%")->take(10)->get();
        
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
        $data = Almacen::where('dep_comercial', 'LIKE', "%$term%")->take(20)->get();
       
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

    // public function searchAduana(Request $request)
    // {

    //     $term = $request->term;
    //     $data = Aduana::where('distrito', 'LIKE', "%$term%")->take(10)->get();
       
    //     if (count($data) == 0) {
    //         $respuesta[] = "No existen coincidencias";
    //     } else {
    //         foreach ($data as  $value) {
    //             $respuesta[] = [
    //                 'label' => $value->distrito,
    //                 'id' => $value->id
    //             ];
    //         }
    //     }
    //     return $respuesta;
    // }
    // public function searchVia(Request $request)
    // {

    //     $term = $request->term;
    //     $data = Via::where('via', 'LIKE', "%$term%")->take(10)->get();
       
    //     if (count($data) == 0) {
    //         $respuesta[] = "No existen coincidencias";
    //     } else {
    //         foreach ($data as  $value) {
    //             $respuesta[] = [
    //                 'label' => $value->via,
    //                 'id' => $value->id
    //             ];
    //         }
    //     }
    //     return $respuesta;
    // }
    // public function searchPaisOrigen(Request $request)
    // {

    //     $term = $request->term;
    //     $data = Pais::where('pais_origen', 'LIKE', "%$term%")->take(10)->get();
        
    //     if (count($data) == 0) {
    //         $respuesta[] = "No existen coincidencias";
    //     } else {
    //         foreach ($data as  $value) {
    //             $respuesta[] = [
    //                 'label' => $value->pais_origen,
    //                 'id' => $value->id
    //             ];
    //         }
    //     }
    //     return $respuesta;
    // }

    // public function searchIncoterm(Request $request)
    // {

    //     $term = $request->term;
    //     $data = App/Models/Incoterm::where('incoterm', 'LIKE', "%$term%")->take(10)->get();
        
    //     if (count($data) == 0) {
    //         $respuesta[] = "No existen coincidencias";
    //     } else {
    //         foreach ($data as  $value) {
    //             $respuesta[] = [
    //                 'label' => $value->incoterm,
    //                 'id' => $value->id
    //             ];
    //         }
    //     }
    //     return $respuesta;
    // }

    public function store(Request $request)
    {
        return redirect('home') > with('mensaje', 'Bien venido!');
    }
}
