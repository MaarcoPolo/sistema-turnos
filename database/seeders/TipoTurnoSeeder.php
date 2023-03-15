<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoTurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_turnos')->insert([
            'descripcion' => 'Atencion Rapida',
            'nomenclatura' => 'R',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'descripcion' => 'Demandas',
            'nomenclatura' => 'D',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'descripcion' => 'Tocas',
            'nomenclatura' => 'T',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'descripcion' => 'Juicios orales',
            'nomenclatura' => 'J',
            'status' => 1,
        ]);
    }
}
