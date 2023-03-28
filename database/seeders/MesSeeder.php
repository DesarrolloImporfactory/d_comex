<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mes;

class MesSeeder extends Seeder
{
    
    public function run()
    {
        $carga =[
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre' , 'Diciembre'
        ];
        foreach ($carga as $cargas) {
            Mes::create([
                'mes'=>$cargas
            ]);
        }
    }
}
