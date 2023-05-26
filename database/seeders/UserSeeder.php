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
            'nombre' => 'AdminPuebla',
            'email' => 'admin_puebla@example.com',
            'username' => 'adminpuebla',
            'password' => 'password',
            'tipo_usuario' => 'administrador',
            'casa_justicia_id' => 1,
            'tipo_usuario_id' => 2,
            'caja_id' => 1,
            'status' => 1,
        ]);
        DB::table('users')->insert([
            'nombre' => 'AdminCholula',
            'email' => 'admin_cholula@example.com',
            'username' => 'admincholula',
            'password' => 'password',
            'tipo_usuario' => 'administrador',
            'casa_justicia_id' => 2,
            'tipo_usuario_id' => 2,
            'caja_id' => 1,
            'status' => 1,
        ]);
        DB::table('users')->insert([
            'nombre' => 'AdminHuejotzingo',
            'email' => 'admin_huejotzingo@example.com',
            'username' => 'adminhuejotzingo',
            'password' => 'password',
            'tipo_usuario' => 'administrador',
            'casa_justicia_id' => 3,
            'tipo_usuario_id' => 2,
            'caja_id' => 1,
            'status' => 1,
        ]);
        DB::table('users')->insert([
            'nombre' => 'AdminLaborales',
            'email' => 'admin_laborales@example.com',
            'username' => 'adminlaborales',
            'password' => 'password',
            'tipo_usuario' => 'administrador',
            'casa_justicia_id' => 4,
            'tipo_usuario_id' => 2,
            'caja_id' => 1,
            'status' => 1,
        ]);
// ventanillas puebla
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
            'nombre' => 'Ventanilla15',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla15',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 1,
            'caja_id' => 15,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        // Ventanillas Cholula
        DB::table('users')->insert([
            'nombre' => 'Ventanilla1',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla1cho',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 2,
            'caja_id' => 16,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla2',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla2cho',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 2,
            'caja_id' => 17,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla3',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla3cho',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 2,
            'caja_id' => 18,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla4',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla4cho',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 2,
            'caja_id' => 19,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla5',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla5cho',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 2,
            'caja_id' => 20,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla6',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla6cho',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 2,
            'caja_id' => 21,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla7',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla7cho',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 2,
            'caja_id' => 22,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla8',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla8cho',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 2,
            'caja_id' => 23,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        // Ventanillas Huejotzingo
        DB::table('users')->insert([
            'nombre' => 'Ventanilla1',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla1hue',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 3,
            'caja_id' => 24,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla2',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla2hue',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 3,
            'caja_id' => 25,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla3',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla3hue',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 3,
            'caja_id' => 26,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        // Ventanillas Laborales
        DB::table('users')->insert([
            'nombre' => 'Ventanilla1',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla1lab',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 4,
            'caja_id' => 27,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla2',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla2lab',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 4,
            'caja_id' => 28,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ventanilla3',
            'email' => 'example1@example.com',
            'password' => 'password',
            'username' => 'ventanilla3lab',
            'tipo_usuario' => 'ventanilla',
            'casa_justicia_id' => 4,
            'caja_id' => 29,
            'status' => 1,
            'tipo_usuario_id' => 3,
        ]);
    }
}
