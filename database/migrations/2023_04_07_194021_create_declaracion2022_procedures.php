<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    
    public function up()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS declaraciones2022;');

        DB::unprepared(
            'CREATE PROCEDURE declaraciones2022(IN desde INT,
                IN hasta INT,
                IN distrito_param VARCHAR(500),
                IN via_param VARCHAR(500),
                IN pais_org_param VARCHAR(500),
                IN pais_emb_param VARCHAR(500),
                IN ciudad_emb_param VARCHAR(500),
                IN regimen_param VARCHAR(500),
                IN incoterm_param VARCHAR(500),
                IN producto_param VARCHAR(500),
                IN marcas_param VARCHAR(500),
                IN sub_part_param VARCHAR(500),
                IN ruc_param VARCHAR(500),
                IN linea_param VARCHAR(500),
                IN embar_consi_param VARCHAR(500),
                IN refrendo_param VARCHAR(500),
                IN agente_af_param VARCHAR(500),
                IN dep_comer_param VARCHAR(500))
                BEGIN
                    SELECT *
                    FROM declaracion2022s
                    WHERE mes between COALESCE(desde, 0000-00-00) and COALESCE(hasta, 9999-12-31) and (distrito = distrito_param OR distrito_param IS NULL)
                    and (via = via_param OR via_param IS NULL) and (pais_origen = pais_org_param OR pais_org_param IS NULL) and (pais_embarque = pais_emb_param OR pais_emb_param IS NULL)
                    and (ciudad_embarque = ciudad_emb_param OR ciudad_emb_param IS NULL) and (regimen = regimen_param OR regimen_param IS NULL) and (incoterm = incoterm_param OR incoterm_param IS NULL)
                    and (producto = producto_param OR producto_param IS NULL) and (marcas = marcas_param OR marcas_param IS NULL) and (subpartida = sub_part_param OR sub_part_param IS NULL)
                    and (ruc = ruc_param OR ruc_param IS NULL) and (linea = linea_param OR linea_param IS NULL) and (embarcador_consigne = embar_consi_param OR embar_consi_param IS NULL)
                    and (refrendo = refrendo_param OR refrendo_param IS NULL) and (agente_afianzado = agente_af_param OR agente_af_param IS NULL) and (dep_comercial = dep_comer_param OR dep_comer_param IS NULL); 
                END;'
        );
    }

    public function down()
    {
        Schema::dropIfExists('declaracion2022_procedures');
    }
};
