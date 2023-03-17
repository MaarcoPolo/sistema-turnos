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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('apellido_paterno', 50)->nullable();
            $table->string('apellido_materno', 50)->nullable();
            $table->string('nombre', 100)->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username');
            $table->string('tipo_usuario');
            $table->unsignedBigInteger('casa_justicia_id');
            $table->unsignedBigInteger('caja_id')->nullable();
            $table->boolean('status');
            $table->rememberToken();
            $table->boolean('status')->default(1);
            $table->foreignId('tipo_usuario_id')->constrained();
            $table->timestamps();

            $table->foreign('casa_justicia_id')->references('id')->on('casas_justicia');
            $table->foreign('caja_id')->references('id')->on('cajas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
