<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nombre' => 'Kevin',
            'email' => 'kevin@example.com',
            'username' => 'kevinvanhalen',
            'password' => 'password',
            'tipo_usuario' => 'administrador',
            'casa_justicia_id' => 1,
            'caja_id' => 1,
            'status' => 1,
            'tipo_usuario_id' => 1,
        ]);

        DB::table('users')->insert([
            'nombre' => 'Felipe',
            'email' => 'example@example.com',
            'password' => 'password',
            'username' => 'admin',
            'tipo_usuario' => 'administrador',
            'casa_justicia_id' => 1,
            'caja_id' => 1,
            'status' => 1,
            'tipo_usuario_id' => 1,
        ]);

        DB::table('users')->insert([
            'nombre' => 'Ventanilla1',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla1',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 1,
            'status' => 1,
            'tipo_usuario_id' => 1,
        ]);
    }
}
