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
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('casa_justicia_id');
            $table->unsignedBigInteger('tipo_turno_id');
            $table->timestamps();

            $table->foreign('casa_justicia_id')->references('id')->on('casas_justicia');
            $table->foreign('tipo_turno_id')->references('id')->on('tipo_turnos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas');
    }
};
