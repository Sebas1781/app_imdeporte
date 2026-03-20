<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cultura_fisica_items', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['actividad', 'servicio']);
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('url')->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cultura_fisica_items');
    }
};
