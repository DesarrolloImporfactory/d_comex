<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decreto extends Model
{
    use HasFactory;
    protected $connection = 'infoaduana';

    protected $table = "decretos_2024";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'periodo',
        'mes',
        'capitulo',
        'desc_capitulo',
        'partida_',
        'desc_partida',
        'ruc',
        'razon_social',
        'razon_social_direccion',
        'remitente',
        'notify',
        'embarcador_consigne',
        'embarcador_consigne_address',
        'refrendo',
        'nume_serie',
        'tipo_aforo',
        'cod_regimen',
        'regimen',
        'distrito',
        'agente_afianzado',
        'agencia',
        'linea',
        'manifiesto',
        'manifiesto_aduana',
        'bl',
        'fecha_embarque',
        'fecha_llegada',
        'fecha_ingreso',
        'fecha_pago',
        'fecha_salida',
        'factura',
        'nave',
        'almacen_temp',
        'dep_comercial',
        'subpartida',
        'tnan',
        'tasa_advalorem',
        'desc_aran',
        'desc_comer',
        'marcas',
        'ciudad_embarque',
        'pais_embarque',
        'pais_origen',
        'tipo_carga',
        'unidades',
        'tipo_unidad',
        'kilos_neto',
        'fob',
        'flete',
        'seguro',
        'cif',
        'codigo_liberacion',
        'cod_liberacion',
        'adv_pag_partida',
        'adv_liq_partida',
        'caracteristica',
        'producto',
        'marca_comercial',
        'year_producido',
        'modelo_mercaderia',
        'fob_unitario',
        'via',
        'regimen_tipo',
        'incoterm',
        'consolidadora',
        'cod_provincia',
        'provincia',
        'formulario',
        'form_via_envio',
        'estado_mercancia',
        'dias_salida',
        'flete2',
        'cif2',
        'cfr',
        'estado_declaracion',
        'tipo_regimen',
        'partida_descripcion',
        'capítulo_descripcion'

    ];

    public function scopeOperacion($query, $operacion)
    {
        if ($operacion)
            return $query->whereIn('regimen_tipo', $operacion);
    }

    public function scopeMes($query, $mes)
    {
        if ($mes)
            return $query->where('mes', $mes);
    }

    public function scopeDistrito($query, $distrito)
    {
        if ($distrito)
            return $query->where('distrito', $distrito);
    }
    public function scopeIva($query, $iva)
    {
        if ($iva)
            return $query->where('via', $iva);
    }
    public function scopeOrigen($query, $origen)
    {
        if ($origen)
            return $query->where('pais_origen', $origen);
    }
    public function scopeEmbarque($query, $embarque)
    {
        if ($embarque)
            return $query->where('pais_embarque', $embarque);
    }

    public function scopeCiudad($query, $ciudad)
    {
        if ($ciudad)
            return $query->where('ciudad_embarque', $ciudad);
    }
    public function scopeRegimen($query, $regimen)
    {
        if ($regimen)
            return $query->where('regimen', $regimen);
    }
    public function scopeIncoterm($query, $incoterm)
    {
        if ($incoterm)
            return $query->where('incoterm', $incoterm);
    }

    public function scopeProducto($query, $producto)
    {
        if ($producto)
            return $query->where('producto', $producto);
    }
    public function scopeMarca($query, $marca)
    {
        if ($marca)
            return $query->where('marcas', $marca);
    }
    public function scopeSubPartida($query, $subPartida)
    {
        if ($subPartida)
            return $query->where('subpartida', $subPartida);
    }
    public function scopeRuc($query, $ruc)
    {
        if ($ruc)
            return $query->where('ruc', $ruc);
    }
    public function scopeLinea($query, $linea)
    {
        if ($linea)
            return $query->where('linea', $linea);
    }
    public function scopeEmbarcador($query, $embarcador)
    {
        if ($embarcador)
            return $query->where('embarcador_consigne', $embarcador);
    }
    public function scopeRefrendo($query, $refrendo)
    {
        if ($refrendo)
            return $query->where('refrendo', $refrendo);
    }
    public function scopeAgenteAfianzado($query, $agente)
    {
        if ($agente)
            return $query->where('agente_afianzado', $agente);
    }
    public function scopeAlmacen($query, $almacen)
    {
        if ($almacen)
            return $query->where('dep_comercial', $almacen);
    }
    public function scopeRango($query, $desde, $hasta)
    {
        if ($desde && $hasta)
            return $query->whereBetween('mes', [$desde, $hasta]);
    }
}
