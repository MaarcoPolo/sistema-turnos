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
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->string('turno');
            $table->foreignId('tipo_turno_id')->constrained();
            // $table->string('tipo_turno_id');
            $table->unsignedBigInteger('casa_justicia_id');
            $table->date('fecha_registro')->nullable();;
            $table->time('hora_registro')->nullable();;
            $table->unsignedBigInteger('prioridad_id');
            $table->integer('en_atencion')->default(0);
            $table->date('fecha_atencion_inicio')->nullable();
            $table->time('hora_atencion_inicio')->nullable();
            $table->date('fecha_atencion_fin')->nullable();
            $table->time('hora_atencion_fin')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('casa_justicia_id')->references('id')->on('casas_justicia');
            $table->foreign('prioridad_id')->references('id')->on('prioridades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
