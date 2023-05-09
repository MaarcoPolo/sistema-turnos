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
            'user_id' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno' => 1,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 2,
            'casa_justicia_id' => 1,
            'tipo_turno' => 2,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 3,
            'casa_justicia_id' => 1,
            'tipo_turno' => 3,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 4,
            'casa_justicia_id' => 1,
            'tipo_turno' => 4,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 5,
            'casa_justicia_id' => 1,
            'tipo_turno' => 5,
        ]);
        DB::table('asignaciones')->insert([
            'user_id' => 6,
            'casa_justicia_id' => 1,
            'tipo_turno' => 6,
        ]);
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
        
    }
}
