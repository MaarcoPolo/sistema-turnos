<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('asignaciones')->insert([
            'user_id' => 7,
            'casa_justicia_id' => 1,
            'tipo_turno' => 1,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 8,
            'casa_justicia_id' => 1,
            'tipo_turno' => 2,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 9,
            'casa_justicia_id' => 1,
            'tipo_turno' => 3,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 10,
            'casa_justicia_id' => 1,
            'tipo_turno' => 4,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 11,
            'casa_justicia_id' => 1,
            'tipo_turno' => 5,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 12,
            'casa_justicia_id' => 1,
            'tipo_turno' => 6,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 13,
            'casa_justicia_id' => 1,
            'tipo_turno' => 1,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 14,
            'casa_justicia_id' => 1,
            'tipo_turno' => 2,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 15,
            'casa_justicia_id' => 1,
            'tipo_turno' => 3,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 16,
            'casa_justicia_id' => 1,
            'tipo_turno' => 4,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 17,
            'casa_justicia_id' => 1,
            'tipo_turno' => 5,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 18,
            'casa_justicia_id' => 1,
            'tipo_turno' => 6,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 19,
            'casa_justicia_id' => 1,
            'tipo_turno' => 1,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 20,
            'casa_justicia_id' => 1,
            'tipo_turno' => 2,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 21,
            'casa_justicia_id' => 1,
            'tipo_turno' => 3,
        ]);
        // Cholula
        DB::table('asignaciones')->insert([
            'user_id' => 22,
            'casa_justicia_id' => 2,
            'tipo_turno' => 1,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 23,
            'casa_justicia_id' => 2,
            'tipo_turno' => 5,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 24,
            'casa_justicia_id' => 2,
            'tipo_turno' => 6,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 25,
            'casa_justicia_id' => 2,
            'tipo_turno' => 1,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 26,
            'casa_justicia_id' => 2,
            'tipo_turno' => 5,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 27,
            'casa_justicia_id' => 2,
            'tipo_turno' => 6,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 28,
            'casa_justicia_id' => 2,
            'tipo_turno' => 1,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 29,
            'casa_justicia_id' => 2,
            'tipo_turno' => 5,
        ]);
        // Huejotzingo
        DB::table('asignaciones')->insert([
            'user_id' => 30,
            'casa_justicia_id' => 3,
            'tipo_turno' => 1,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 31,
            'casa_justicia_id' => 3,
            'tipo_turno' => 5,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 32,
            'casa_justicia_id' => 3,
            'tipo_turno' => 1,
        ]);
        // Laborales
        DB::table('asignaciones')->insert([
            'user_id' => 33,
            'casa_justicia_id' => 4,
            'tipo_turno' => 1,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 34,
            'casa_justicia_id' => 4,
            'tipo_turno' => 1,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 35,
            'casa_justicia_id' => 4,
            'tipo_turno' => 1,
        ]);
        
    }
}
