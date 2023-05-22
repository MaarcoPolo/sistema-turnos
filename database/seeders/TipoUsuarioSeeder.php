<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_usuarios')->insert([
            'nombre' => 'superadmin',
        ]);
        DB::table('tipo_usuarios')->insert([
            'nombre' => 'Administrador',
        ]);
        DB::table('tipo_usuarios')->insert([
            'nombre' => 'Ventanilla',
        ]);
    }
}
