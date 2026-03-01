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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presentation_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('item');
            $table->string('cliente');
            $table->string('responsable_elaboracion');
            $table->date('fecha_revision_interna')->nullable();
            $table->date('fecha_entrega_cliente')->nullable();
            $table->date('fecha_revision_cliente')->nullable();
            $table->string('responsable_sesion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
