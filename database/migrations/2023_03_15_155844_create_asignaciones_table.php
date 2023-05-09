<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('casa_justicia_id');
            $table->unsignedBigInteger('tipo_turno');
            // $table->integer('tipo_atencion');
            $table->boolean('asignacion')->default(false); //bandera
            $table->timestamps();

            $table->foreign('casa_justicia_id')->references('id')->on('casas_justicia');
            $table->foreign('tipo_turno')->references('id')->on('tipo_turnos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};
