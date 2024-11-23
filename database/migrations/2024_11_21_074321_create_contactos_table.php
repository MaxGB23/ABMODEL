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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Campo para el nombre del contacto
            $table->string('correo'); // Campo para el correo electrónico
            $table->string('telefono'); // Campo para el número de teléfono
            $table->string('asunto'); // Campo para el asunto del mensaje
            $table->text('mensaje'); // Campo para el mensaje del contacto
            $table->enum('status', ['pendiente', 'atendido'])->default('pendiente'); // Estado del mensaje
            $table->foreignId('updated_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
