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
        Schema::create('carga_trabajo', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained();
            $table->unsignedBigInteger('casa_justicia_id');
            $table->foreignId('tipo_turno_id')->constrained();
            $table->boolean('asignacion')->default(0);
            $table->timestamps();
            
            $table->foreign('casa_justicia_id')->references('id')->on('casas_justicia');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carga_trabajo');
    }
};
