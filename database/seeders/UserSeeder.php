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
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla2',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla2',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 2,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla3',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla3',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 3,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla4',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla4',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 4,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla5',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla5',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 5,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla6',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla6',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 6,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla7',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla7',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 7,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla8',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla8',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 8,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla9',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla9',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 9,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla10',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla10',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 10,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla11',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla11',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 11,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla12',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla12',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 12,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla13',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla13',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 13,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla14',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla14',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 14,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla5',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla15',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 15,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
    }
}
