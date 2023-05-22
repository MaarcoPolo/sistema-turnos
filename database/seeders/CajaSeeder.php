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
            'nombre' => 'Ventanilla 1',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 2',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 2,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 3',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 3,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 4',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 5',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 5,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 6',
            'status' => 1,
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 6,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 7',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 8',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 2,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 9',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 3,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 10',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 4,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 11',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 5,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 12',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 6,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 13',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 14',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 2,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 15',
            'casa_justicia_id' => 1,
            'tipo_turno_id' => 3,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 1',
            'casa_justicia_id' => 2,
            'tipo_turno_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 2',
            'casa_justicia_id' => 2,
            'tipo_turno_id' => 5,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 3',
            'casa_justicia_id' => 2,
            'tipo_turno_id' => 6,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 4',
            'casa_justicia_id' => 2,
            'tipo_turno_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 5',
            'casa_justicia_id' => 2,
            'tipo_turno_id' => 5,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 6',
            'casa_justicia_id' => 2,
            'tipo_turno_id' => 6,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 7',
            'casa_justicia_id' => 2,
            'tipo_turno_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 8',
            'casa_justicia_id' => 2,
            'tipo_turno_id' => 5,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 1',
            'casa_justicia_id' => 3,
            'tipo_turno_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 2',
            'casa_justicia_id' => 3,
            'tipo_turno_id' => 5,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 3',
            'casa_justicia_id' => 3,
            'tipo_turno_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 1',
            'casa_justicia_id' => 4,
            'tipo_turno_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 2',
            'casa_justicia_id' => 4,
            'tipo_turno_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla 3',
            'casa_justicia_id' => 4,
            'tipo_turno_id' => 1,
        ]);
    }
}
