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
}
