<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('turnos')->insert([
            'turno' => 'R0001P',
            'tipo_turno_id' => 1,
            'casa_justicia_id' => 1,
            // 'fecha_registro' => '',
            // 'hora_registro' => '',
            'prioridad_id' => 1,
            // 'fecha_atencion_inicio' => '',
            // 'hora_atencion_inicio' => '',
            // 'fecha_atencion_fin' => '',
            // 'hora_atencion_fin' => '',
            'user_id' => 1,
            'status' => 1,

        ]);
    }
}
