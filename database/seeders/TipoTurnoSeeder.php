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
            'nombre' => 'Escritos con Anexos',
            'descripcion' => 'escritos con anexos',
            'nomenclatura' => 'T',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'nombre' => 'Apelaciones y Escritos salas',
            'descripcion' => 'Turno Sala',
            'nomenclatura' => 'S',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'nombre' => 'Trabajadores PJ',
            'descripcion' => 'Turno Interno',
            'nomenclatura' => 'A',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'nombre' => 'Escritos Sin Anexos',
            'descripcion' => 'Atención Rápida',
            'nomenclatura' => 'R',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'nombre' => 'Demanda Nueva',
            'descripcion' => 'Turno Demanda',
            'nomenclatura' => 'D',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'nombre' => 'Citas oralidad familiar',
            'descripcion' => 'Oral Familiar',
            'nomenclatura' => 'J',
            'status' => 1,
        ]);

        DB::table('tipo_turnos')->insert([
            'nombre' => 'Exhortos',
            'descripcion' => 'Exhortos',
            'nomenclatura' => 'E',
            'status' => 1,
        ]);
    }
}
