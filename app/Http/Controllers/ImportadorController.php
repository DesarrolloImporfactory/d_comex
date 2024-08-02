<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;
use App\Models\Decreto;

class ImportadorController extends Controller
{
    public function index()
    {
        return view('importador.index');
    }

    public function store(Request $request)
    {
        // Validación del archivo
        $request->validate([
            'file' => 'required|mimes:xls,xlsx|max:2048',
            'anio' => 'required|integer|min:2020|max:' . date('Y'),
        ]);

        $year = $request->input('anio');
        $tableName = "decreto_$year";

        // Columnas esperadas
        $expectedColumns = [
            'periodo', 'mes', 'capitulo', 'desc_capitulo', 'partida_', 'desc_partida',
            'ruc', 'razon_social', 'razon_social_direccion', 'remitente', 'notify',
            'embarcador_consigne', 'embarcador_consigne_address', 'refrendo', 'nume_serie',
            'tipo_aforo', 'cod_regimen', 'regimen', 'distrito', 'agente_afianzado', 'agencia',
            'linea', 'manifiesto', 'manifiesto_aduana', 'bl', 'fecha_embarque', 'fecha_llegada',
            'fecha_ingreso', 'fecha_pago', 'fecha_salida', 'factura', 'nave', 'almacen_temp',
            'dep_comercial', 'subpartida', 'tnan', 'tasa_advalorem', 'desc_aran', 'desc_comer',
            'marcas', 'ciudad_embarque', 'pais_embarque', 'pais_origen', 'tipo_carga', 'unidades',
            'tipo_unidad', 'kilos_neto', 'fob', 'flete', 'seguro', 'cif', 'codigo_liberacion',
            'cod_liberacion', 'adv_pag_partida', 'adv_liq_partida', 'caracteristica', 'producto',
            'marca_comercial', 'year_producido', 'modelo_mercaderia', 'fob_unitario', 'via',
            'regimen_tipo', 'incoterm', 'consolidadora', 'cod_provincia', 'provincia', 'formulario',
            'form_via_envio', 'estado_mercancia', 'dias_salida', 'flete2', 'cif2', 'cfr',
            'estado_declaracion'
        ];

        // Procesar el archivo Excel
        try {
            $filePath = $request->file('file')->getPathName();
            $spreadsheet = IOFactory::load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();

            // Verificar las columnas del Excel
            $columns = $worksheet->rangeToArray('A1:' . $worksheet->getHighestColumn() . '1')[0];

            // Validar si las columnas esperadas están presentes
            if (!$this->validateColumns($expectedColumns, $columns)) {
                return back()->withErrors(['file' => 'El archivo no contiene las columnas esperadas.']);
            }

            // Recorremos las filas y almacenamos en la base de datos
            foreach ($worksheet->getRowIterator(2) as $row) { // Inicia desde la segunda fila (1-indexed)
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                $rowData = [];
                foreach ($cellIterator as $cell) {
                    $rowData[] = $cell->getValue();
                }

                // Mapear los datos del archivo Excel con las columnas de la tabla
                Decreto::create([
                    'periodo' => $rowData[0],
                    'mes' => $rowData[1],
                    'capitulo' => $rowData[2],
                    'desc_capitulo' => $rowData[3],
                    'partida_' => $rowData[4],
                    'desc_partida' => $rowData[5],
                    'ruc' => $rowData[6],
                    'razon_social' => $rowData[7],
                    'razon_social_direccion' => $rowData[8],
                    'remitente' => $rowData[9],
                    'notify' => $rowData[10],
                    'embarcador_consigne' => $rowData[11],
                    'embarcador_consigne_address' => $rowData[12],
                    'refrendo' => $rowData[13],
                    'nume_serie' => $rowData[14],
                    'tipo_aforo' => $rowData[15],
                    'cod_regimen' => $rowData[16],
                    'regimen' => $rowData[17],
                    'distrito' => $rowData[18],
                    'agente_afianzado' => $rowData[19],
                    'agencia' => $rowData[20],
                    'linea' => $rowData[21],
                    'manifiesto' => $rowData[22],
                    'manifiesto_aduana' => $rowData[23],
                    'bl' => $rowData[24],
                    'fecha_embarque' => $rowData[25],
                    'fecha_llegada' => $rowData[26],
                    'fecha_ingreso' => $rowData[27],
                    'fecha_pago' => $rowData[28],
                    'fecha_salida' => $rowData[29],
                    'factura' => $rowData[30],
                    'nave' => $rowData[31],
                    'almacen_temp' => $rowData[32],
                    'dep_comercial' => $rowData[33],
                    'subpartida' => $rowData[34],
                    'tnan' => $rowData[35],
                    'tasa_advalorem' => $rowData[36],
                    'desc_aran' => $rowData[37],
                    'desc_comer' => $rowData[38],
                    'marcas' => $rowData[39],
                    'ciudad_embarque' => $rowData[40],
                    'pais_embarque' => $rowData[41],
                    'pais_origen' => $rowData[42],
                    'tipo_carga' => $rowData[43],
                    'unidades' => $rowData[44],
                    'tipo_unidad' => $rowData[45],
                    'kilos_neto' => $rowData[46],
                    'fob' => $rowData[47],
                    'flete' => $rowData[48],
                    'seguro' => $rowData[49],
                    'cif' => $rowData[50],
                    'codigo_liberacion' => $rowData[51],
                    'cod_liberacion' => $rowData[52],
                    'adv_pag_partida' => $rowData[53],
                    'adv_liq_partida' => $rowData[54],
                    'caracteristica' => $rowData[55],
                    'producto' => $rowData[56],
                    'marca_comercial' => $rowData[57],
                    'year_producido' => $rowData[58],
                    'modelo_mercaderia' => $rowData[59],
                    'fob_unitario' => $rowData[60],
                    'via' => $rowData[61],
                    'regimen_tipo' => $rowData[62],
                    'incoterm' => $rowData[63],
                    'consolidadora' => $rowData[64],
                    'cod_provincia' => $rowData[65],
                    'provincia' => $rowData[66],
                    'formulario' => $rowData[67],
                    'form_via_envio' => $rowData[68],
                    'estado_mercancia' => $rowData[69],
                    'dias_salida' => $rowData[70],
                    'flete2' => $rowData[71],
                    'cif2' => $rowData[72],
                    'cfr' => $rowData[73],
                    'estado_declaracion' => $rowData[74],
                ]);
            }

            return back()->with('success', 'Archivo importado y datos almacenados correctamente.');
        } catch (ReaderException $e) {
            return back()->withErrors(['file' => 'Error al leer el archivo Excel: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            return back()->withErrors(['file' => 'Ocurrió un error inesperado al procesar el archivo: ' . $e->getMessage()]);
        }
    }


    private function validateColumns(array $expectedColumns, array $columns)
    {
        return !array_diff($expectedColumns, $columns);
    }
}
