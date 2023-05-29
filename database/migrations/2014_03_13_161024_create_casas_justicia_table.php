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
        Schema::create('casas_justicia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nomenclatura');
            $table->string('nombre_impresora');
            $table->string('tipo_conexion_impresora');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casas_justicia');
    }
};
