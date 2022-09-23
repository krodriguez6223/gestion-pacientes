<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            'nombres' => 'Jose',
            'apellidos' => 'Mendoza',
            'edad' => '28',
            'sexo' => 'Maculino',
            'direccion' => 'Portoviejo',
            'cedula' => '1314076523',
            'telefono' => '095855585',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('pacientes')->insert([
            'nombres' => 'Maria',
            'apellidos' => 'Mendoza',
            'edad' => '30',
            'sexo' => 'Femenina',
            'direccion' => 'Manta',
            'cedula' => '1314076553',
            'telefono' => '0958555585',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('pacientes')->insert([
            'nombres' => 'Andres',
            'apellidos' => 'Espinoza',
            'edad' => '25',
            'sexo' => 'Maculino',
            'direccion' => 'Portoviejo',
            'cedula' => '1355076523',
            'telefono' => '09566585',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

    }
}
