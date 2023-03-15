<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prioridades')->insert([
            'descripcion' => 'Atencion Rapida',
            'status' => 1,
        ]);

        DB::table('prioridades')->insert([
            'descripcion' => 'Demandas',
            'status' => 1,
        ]);

        DB::table('prioridades')->insert([
            'descripcion' => 'Tocas',
            'status' => 1,
        ]);

        DB::table('prioridades')->insert([
            'descripcion' => 'Juicios orales',
            'status' => 1,
        ]);
    }
}
