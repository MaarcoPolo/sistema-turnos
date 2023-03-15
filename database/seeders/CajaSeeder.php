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
            'casa_justicia_id' => 1,
            'prioridad_id' => 1,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla2',
            'casa_justicia_id' => 1,
            'prioridad_id' => 2,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla3',
            'casa_justicia_id' => 1,
            'prioridad_id' => 3,
        ]);
        DB::table('cajas')->insert([
            'nombre' => 'Ventanilla4',
            'casa_justicia_id' => 1,
            'prioridad_id' => 4,
        ]);
    }
}
