<?php

namespace App\Http\Controllers;

use App\Models\CiudadEmbarque;
use Illuminate\Http\Request;
use App\Models\DeclaracionEcuador;
use App\Models\Mes;
use App\Models\PaisEmbarque;
use App\Models\Regimen;

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
        return view('home',compact('meses','regimens','ciudadEmbarques','paisEmbarques'));
        // return view('home',compact('meses','regimens','ciudadEmbarques','paisEmbarques','distritos','transportes','paisOrigen','incoterm'));
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

    public function searchPartidaArancel(Request $request){
        $term = $request->term;
        $data = DeclaracionEcuador::where('subpartida', 'LIKE', "%$term%")->take(7)->get();
        if(count($data)== 0){
             $respuesta[] = "No existen coincidencias";
        }else{
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->subpartida,
                    'id'=> $value->id
                ];
            }
        }
        return $respuesta;
    }
    public function searchTransporte(Request $request){
        $term = $request->term;
        $data = DeclaracionEcuador::where('linea', 'LIKE', "%$term%")->take(7)->get();
        if(count($data)== 0){
             $respuesta[] = "No existen coincidencias";
        }else{
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->linea,
                    'id'=> $value->id
                ];
            }
        }
        return $respuesta;
    }
    public function searchAgenteAduana(Request $request){
        $term = $request->term;
        $data = DeclaracionEcuador::where('agente_afianzado', 'LIKE', "%$term%")->take(7)->get();
        if(count($data)== 0){
             $respuesta[] = "No existen coincidencias";
        }else{
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->agente_afianzado,
                    'id'=> $value->id
                ];
            }
        }
        return $respuesta;
    }
    public function searchAlmacen(Request $request){
        $term = $request->term;
        $data = DeclaracionEcuador::where('dep_comercial', 'LIKE', "%$term%")->take(7)->get();
        if(count($data)== 0){
             $respuesta[] = "No existen coincidencias";
        }else{
            foreach ($data as  $value) {
                $respuesta[] = [
                    'label' => $value->dep_comercial,
                    'id'=> $value->id
                ];
            }
        }
        return $respuesta;
    }
}
