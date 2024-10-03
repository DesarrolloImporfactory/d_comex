<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decretos_2024', function (Blueprint $table) {
            $table->id();
            $table->string('periodo');
            $table->string('mes');
            $table->string('capitulo');
            $table->string('desc_capitulo');
            $table->string('partida_');
            $table->string('desc_partida');
            $table->string('ruc');
            $table->string('razon_social');
            $table->string('razon_social_direccion');
            $table->string('remitente');
            $table->string('notify');
            $table->string('embarcador_consigne');
            $table->string('embarcador_consigne_address');
            $table->string('refrendo');
            $table->string('nume_serie');
            $table->string('tipo_aforo');
            $table->string('cod_regimen');
            $table->string('regimen');
            $table->string('distrito');
            $table->string('agente_afianzado');
            $table->string('agencia');
            $table->string('linea');
            $table->string('manifiesto');
            $table->string('manifiesto_aduana');
            $table->string('bl');
            $table->date('fecha_embarque');
            $table->date('fecha_llegada');
            $table->date('fecha_ingreso');
            $table->date('fecha_pago');
            $table->date('fecha_salida');
            $table->string('factura');
            $table->string('nave');
            $table->string('almacen_temp');
            $table->string('dep_comercial');
            $table->string('subpartida');
            $table->string('tnan');
            $table->string('tasa_advalorem');
            $table->string('desc_aran');
            $table->string('desc_comer');
            $table->string('marcas');
            $table->string('ciudad_embarque');
            $table->string('pais_embarque');
            $table->string('pais_origen');
            $table->string('tipo_carga');
            $table->string('unidades');
            $table->string('tipo_unidad');
            $table->string('kilos_neto');
            $table->decimal('fob', 10, 2);
            $table->decimal('flete', 10, 2);
            $table->decimal('seguro', 10, 2);
            $table->decimal('cif', 10, 2);
            $table->string('codigo_liberacion');
            $table->string('cod_liberacion');
            $table->string('adv_pag_partida');
            $table->string('adv_liq_partida');
            $table->string('caracteristica');
            $table->string('producto');
            $table->string('marca_comercial');
            $table->integer('year_producido');
            $table->string('modelo_mercaderia');
            $table->decimal('fob_unitario', 10, 2);
            $table->string('via');
            $table->string('regimen_tipo');
            $table->string('incoterm');
            $table->string('consolidadora');
            $table->string('cod_provincia');
            $table->string('provincia');
            $table->string('formulario');
            $table->string('form_via_envio');
            $table->string('estado_mercancia');
            $table->integer('dias_salida');
            $table->decimal('flete2', 10, 2);
            $table->decimal('cif2', 10, 2);
            $table->decimal('cfr', 10, 2);
            $table->string('estado_declaracion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decretos');
    }
};
