<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('declaracion_ecuadors', function (Blueprint $table) {
            $table->id();
            $table->text('year')->nullable();
            $table->text('mes')->nullable();
            $table->text('capitulo')->nullable();
            $table->text('desc_capitulo')->nullable();
            $table->text('partida_')->nullable();
            $table->text('desc_partida')->nullable();
            $table->text('ruc')->nullable();
            $table->text('razon_social')->nullable();
            $table->text('razon_social_direccion')->nullable();
            $table->text('remitente')->nullable();
            $table->text('notify')->nullable();
            $table->text('embarcador_consigne')->nullable();
            $table->text('embarcador_consigne_address')->nullable();
            $table->text('refrendo')->nullable();
            $table->text('nume_serie')->nullable();
            $table->text('tipo_aforo')->nullable();
            $table->text('cod_regimen')->nullable();
            $table->text('regimen')->nullable();
            $table->text('distrito')->nullable();
            $table->text('agente_afianzado')->nullable();
            $table->text('agencia')->nullable();
            $table->text('linea')->nullable();
            $table->text('manifiesto')->nullable();
            $table->text('manifiesto_aduana')->nullable();
            $table->text('bl')->nullable();
            $table->text('fecha_embarque')->nullable();
            $table->text('fecha_llegada')->nullable();
            $table->text('fecha_ingreso')->nullable();
            $table->text('fecha_pago')->nullable();
            $table->text('fecha_salida')->nullable();
            $table->text('factura')->nullable();
            $table->text('nave')->nullable();
            $table->text('almacen_temp')->nullable();
            $table->text('dep_comercial')->nullable();
            $table->text('subpartida')->nullable();
            $table->text('tnan')->nullable();
            $table->text('tasa_advalorem')->nullable();
            $table->text('desc_aran')->nullable();
            $table->text('desc_comer')->nullable();
            $table->text('marcas')->nullable();
            $table->text('ciudad_embarque')->nullable();
            $table->text('pais_embarque')->nullable();
            $table->text('pais_origen')->nullable();
            $table->text('tipo_carga')->nullable();
            $table->text('unidades')->nullable();
            $table->text('tipo_unidad')->nullable();
            $table->text('kilos_neto')->nullable();
            $table->text('fob')->nullable();
            $table->text('flete')->nullable();
            $table->text('seguro')->nullable();
            $table->text('cif')->nullable();
            $table->text('codigo_liberacion')->nullable();
            $table->text('cod_liberacion')->nullable();
            $table->text('adv_pag_partida')->nullable();
            $table->text('adv_liq_partida')->nullable();
            $table->text('caracteristica')->nullable();
            $table->text('producto')->nullable();
            $table->text('marca_comercial')->nullable();
            $table->text('year_producido')->nullable();
            $table->text('modelo_mercaderia')->nullable();
            $table->text('fob_unitario')->nullable();
            $table->text('via')->nullable();
            $table->text('regimen_tipo')->nullable();
            $table->text('incoterm')->nullable();
            $table->text('consolidadora')->nullable();
            $table->text('cod_provincia')->nullable();
            $table->text('provincia')->nullable();
            $table->text('formulario')->nullable();
            $table->text('form_via_envio')->nullable();
            $table->text('estado_mercancia')->nullable();
            $table->text('dias_salida')->nullable();
            $table->text('flete2')->nullable();
            $table->text('cif2')->nullable();
            $table->text('cfr')->nullable();
            $table->text('estado_declaracion')->nullable();

        });
    }


    public function down()
    {
        Schema::dropIfExists('declaracion_ecuadors');
    }
};
