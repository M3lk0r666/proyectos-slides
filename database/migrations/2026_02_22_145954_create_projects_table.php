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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presentation_id')->constrained()->cascadeOnDelete();
            $table->string('cliente_nombre');
            $table->string('cliente_logo_path')->nullable();
            $table->string('nombre');
            $table->string('tecnologia');
            $table->string('estatus_label');
            $table->string('estatus_color')->default('gray');
            $table->date('fecha_programada')->nullable();
            $table->string('horario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
