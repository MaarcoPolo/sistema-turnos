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
            'nombre' => 'Turno',
            'descripcion' => 'Turno',
            'nomenclatura' => 'T',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'nombre' => 'Turno Sala',
            'descripcion' => 'Turno Sala',
            'nomenclatura' => 'S',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'nombre' => 'Turno Interno',
            'descripcion' => 'Turno Interno',
            'nomenclatura' => 'A',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'nombre' => 'Atención Rapida',
            'descripcion' => 'Atención Rápida',
            'nomenclatura' => 'R',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'nombre' => 'Turno Demanda',
            'descripcion' => 'Turno Demanda',
            'nomenclatura' => 'D',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'nombre' => 'Oral Familiar',
            'descripcion' => 'Oral Familiar',
            'nomenclatura' => 'J',
            'status' => 1,
        ]);
    }
}
