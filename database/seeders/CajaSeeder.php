<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla1',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla2',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 2,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla3',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 3,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla4',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla5',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla6',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla7',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla8',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla9',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla10',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla11',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla12',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla13',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla14',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla15',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
    }
}
