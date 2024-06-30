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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nacionalidade')->nullable();
            $table->string('profissao')->nullable();
            $table->string('numero_bi')->nullable();
            $table->string('morada')->nullable();
            $table->string('telefone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nacionalidade');
            $table->dropColumn('profissao');
            $table->dropColumn('numero_bi');
            $table->dropColumn('morada');
            $table->dropColumn('telefone');
        });
    }
};
