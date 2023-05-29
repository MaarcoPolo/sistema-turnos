<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CasaJusticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('casas_justicia')->insert([
            'nombre' => 'Puebla',
            'nomenclatura' => 'P',
            'nombre_impresora' => 'Epson1',
            'tipo_conexion_impresora' => 'local',
            'status' => 1,
        ]);
        DB::table('casas_justicia')->insert([
            'nombre' => 'Cholula',
            'nomenclatura' => 'C',
            'nombre_impresora' => 'Epson1',
            'tipo_conexion_impresora' => 'local',
            'status' => 1,
        ]);
        DB::table('casas_justicia')->insert([
            'nombre' => 'Huejotzingo',
            'nomenclatura' => 'H',
            'nombre_impresora' => 'Epson1',
            'tipo_conexion_impresora' => 'local',
            'status' => 1,
        ]);
        DB::table('casas_justicia')->insert([
            'nombre' => 'Laborales',
            'nomenclatura' => 'L',
            'nombre_impresora' => 'Epson1',
            'tipo_conexion_impresora' => 'local',
            'status' => 1,
        ]);

    }
}
