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
        Schema::create('ticket_global_agents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presentation_id')->constrained()->cascadeOnDelete();
            $table->string('agente_nombre');
            $table->unsignedInteger('asignados')->default(0);
            $table->unsignedInteger('cerrados')->default(0);
            $table->unsignedInteger('primera_respuesta')->default(0);
            $table->unsignedInteger('espera_cliente')->default(0);
            $table->unsignedInteger('en_curso')->default(0);
            $table->unsignedInteger('pendiente')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_global_agents');
    }
};
