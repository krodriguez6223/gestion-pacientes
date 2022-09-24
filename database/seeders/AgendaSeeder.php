<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agendas')->insert([
            'fecha' => '2022-09-15',
            'hora' => '11:00:00',
            'sintomas' => 'dolor de huesos, anemia',
            'departamento' => 'odocntologia ',
            'paciente_id' => '1',
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('agendas')->insert([
            'fecha' => '2022-10-15',
            'hora' => '12:00:00',
            'sintomas' => 'dolor de cabeza',
            'departamento' => 'medicina general ',
            'paciente_id' => '2',
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
