<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeclaracionEcuador extends Model
{
    use HasFactory;

    public function scopeDistrito($query, $distrito){
        if($distrito)
            return $query->where('distrito',$distrito);
    }
    public function scopeIva($query, $iva){
        if($iva)
            return $query->where('via',$iva);
    }
    public function scopeOrigen($query, $origen){
        if($origen)
            return $query->where('pais_origen',$origen);
    }
    public function scopeEmbarque($query, $embarque){
        if($embarque)
            return $query->where('pais_embarque',$embarque);
    }
  
    public function scopeCiudad($query, $ciudad){
        if($ciudad)
            return $query->where('ciudad_embarque',$ciudad);
    }
    public function scopeRegimen($query, $regimen){
        if($regimen)
            return $query->where('regimen',$regimen);
    }
    public function scopeIncoterm($query, $incoterm){
        if($incoterm)
            return $query->where('incoterm',$incoterm);
    }

    public function scopeProducto($query, $producto){
        if($producto)
            return $query->where('producto',$producto);
    }
    public function scopeMarca($query, $marca){
        if($marca)
            return $query->where('marcas',$marca);
    }
    public function scopeSubPartida($query, $subPartida){
        if($subPartida)
            return $query->where('subpartida',$subPartida);
    }
    public function scopeRuc($query, $ruc){
        if($ruc)
            return $query->where('ruc',$ruc);
    }
    public function scopeLinea($query, $linea){
        if($linea)
            return $query->where('linea',$linea);
    }
    public function scopeEmbarcador($query, $embarcador){
        if($embarcador)
            return $query->where('embarcador_consigne',$embarcador);
    }
    public function scopeRefrendo($query, $refrendo){
        if($refrendo)
            return $query->where('refrendo',$refrendo);
    }
    public function scopeAgenteAfianzado($query, $agente){
        if($agente)
            return $query->where('agente_afianzado',$agente);
    }
    public function scopeAlmacen($query, $almacen){
        if($almacen)
            return $query->where('dep_comercial',$almacen);
    }
}
