<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'KevinVanHalen',
            'email' => 'keviinvanhalen@gmail.com',
            'email_verified_at' => now(),
            // 'password' => Hash::make('password'),
            'password' => 'password',
            'nombre' => 'Kevin Brian',
            'apellido_paterno' => 'Corona',
            'apellido_materno' => 'Salgado',
            'tipo_usuario_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
