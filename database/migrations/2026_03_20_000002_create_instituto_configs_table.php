<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instituto_configs', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion')->nullable();
            $table->string('titular_nombre')->nullable();
            $table->string('titular_cargo')->nullable();
            $table->string('titular_imagen')->nullable();
            $table->timestamps();
        });

        Schema::create('organigrama_items', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->tinyInteger('nivel')->default(1); // 1, 2, 3
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organigrama_items');
        Schema::dropIfExists('instituto_configs');
    }
};
