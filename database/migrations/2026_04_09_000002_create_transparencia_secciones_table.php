<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transparencia_secciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo_id')->constrained('transparencia_grupos')->cascadeOnDelete();
            $table->string('titulo');
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transparencia_secciones');
    }
};
