<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transparencia_grupos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['sevac', 'conac', 'presupuesto']);
            $table->integer('anio');
            $table->integer('orden')->default(0);
            $table->timestamps();

            $table->unique(['tipo', 'anio']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transparencia_grupos');
    }
};
