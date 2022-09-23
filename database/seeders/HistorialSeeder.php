<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HistorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('historials')->insert([
            'antecedentes' => 'alergias',
            'tratamiento' => 'medicamentos topicos',
            'enfermedades' => 'dolor de huesos, anemia',
            'altura' => '1.70 ',
            'peso' => '145.2',
            'temperatura' => '35',
            'paciente_id' => '1',
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('historials')->insert([
            'antecedentes' => 'gripe, dolor de huesos',
            'tratamiento' => 'medicamentos topicos, calmantes',
            'enfermedades' => 'dolor de huesos, anemia, resfriados constantes',
            'altura' => '1.70 ',
            'peso' => '130.2',
            'temperatura' => '28',
            'paciente_id' => '1',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('historials')->insert([
            'antecedentes' => 'gripe, dolres',
            'tratamiento' => 'medicamentos',
            'enfermedades' => 'cancer, anemia, escleorosis',
            'altura' => '1.60 ',
            'peso' => '150.2',
            'temperatura' => '23',
            'paciente_id' => '2',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('historials')->insert([
            'antecedentes' => 'alergias',
            'tratamiento' => 'calmantes',
            'enfermedades' => 'resfriados constantes',
            'altura' => '1.50 ',
            'peso' => '120.2',
            'temperatura' => '30',
            'paciente_id' => '3',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
