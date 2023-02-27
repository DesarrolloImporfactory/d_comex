<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeclaracionEcuador;
use App\Models\Mes;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $declaraciones = DeclaracionEcuador::all();
        $meses = Mes::all();
        return view('home',compact('declaraciones','meses'));
    }

    public function searchProducto(Request $request){
        $term = $request->term;
        $data = DeclaracionEcuador::where('producto', 'LIKE', "%$term%")->take(7)->get();
        if(count($data)== 0){
             $respuesta[] = "No existen coincidencias";
        }else{
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->producto,
                    'id'=> $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchMarca(Request $request){
        $term = $request->term;
        $data = DeclaracionEcuador::where('marca', 'LIKE', "%$term%")->take(7)->get();
        if(count($data)== 0){
             $respuesta[] = "No existen coincidencias";
        }else{
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->marca,
                    'id'=> $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchRuc(Request $request){
        $term = $request->term;
        $data = DeclaracionEcuador::where('ruc', 'LIKE', "%$term%")->take(7)->get();
        if(count($data)== 0){
             $respuesta[] = "No existen coincidencias";
        }else{
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->ruc,
                    'id'=> $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchNave(Request $request){
        $term = $request->term;
        $data = DeclaracionEcuador::where('nave', 'LIKE', "%$term%")->take(7)->get();
        if(count($data)== 0){
             $respuesta[] = "No existen coincidencias";
        }else{
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->nave,
                    'id'=> $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchEmbarcadorConsigne(Request $request){
        $term = $request->term;
        $data = DeclaracionEcuador::where('embarcador_consigne', 'LIKE', "%$term%")->take(7)->get();
        if(count($data)== 0){
             $respuesta[] = "No existen coincidencias";
        }else{
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->embarcador_consigne,
                    'id'=> $value->id
                ];
            }
        }
        return $respuesta;
    }

    public function searchRefrendo(Request $request){
        $term = $request->term;
        $data = DeclaracionEcuador::where('refrendo', 'LIKE', "%$term%")->take(7)->get();
        if(count($data)== 0){
             $respuesta[] = "No existen coincidencias";
        }else{
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->refrendo,
                    'id'=> $value->id
                ];
            }
        }
        return $respuesta;
    }
}
