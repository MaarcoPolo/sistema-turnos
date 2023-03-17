<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contadores')->insert([
            'contador' => 0,
            'casa_justicia_id' => 1,
        ]);
        DB::table('contadores')->insert([
            'contador' => 0,
            'casa_justicia_id' => 2,
        ]);
        DB::table('contadores')->insert([
            'contador' => 0,
            'casa_justicia_id' => 3,
        ]);
        DB::table('contadores')->insert([
            'contador' => 0,
            'casa_justicia_id' => 4,
        ]);
    }
}
