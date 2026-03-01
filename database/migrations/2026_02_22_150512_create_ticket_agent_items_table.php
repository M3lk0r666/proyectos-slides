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
        Schema::create('ticket_agent_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_global_agent_id')->constrained()->cascadeOnDelete();
            $table->string('solicitante');
            $table->string('asunto');
            $table->string('ticket_codigo');
            $table->string('estatus');
            $table->string('responsable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_agent_items');
    }
};
