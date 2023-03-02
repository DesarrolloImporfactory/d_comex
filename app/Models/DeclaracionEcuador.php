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
            return $query->where('iva',$iva);
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
}
