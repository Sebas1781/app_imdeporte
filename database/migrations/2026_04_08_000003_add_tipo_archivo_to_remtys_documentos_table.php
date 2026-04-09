<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('remtys_documentos', function (Blueprint $table) {
            $table->enum('tipo_archivo', ['pdf', 'link'])->default('pdf')->after('nombre');
        });
    }

    public function down(): void
    {
        Schema::table('remtys_documentos', function (Blueprint $table) {
            $table->dropColumn('tipo_archivo');
        });
    }
};
