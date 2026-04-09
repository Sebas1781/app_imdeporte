<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('remtys_categorias', function (Blueprint $table) {
            $table->string('icono')->default('fa-folder')->after('color');
        });
    }

    public function down(): void
    {
        Schema::table('remtys_categorias', function (Blueprint $table) {
            $table->dropColumn('icono');
        });
    }
};
