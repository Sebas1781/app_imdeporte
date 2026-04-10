<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transparencia_documentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seccion_id')->constrained('transparencia_secciones')->cascadeOnDelete();
            $table->string('nombre');
            $table->enum('tipo_archivo', ['pdf', 'link'])->default('pdf');
            $table->string('archivo');
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transparencia_documentos');
    }
};
