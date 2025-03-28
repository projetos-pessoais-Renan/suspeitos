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
        Schema::create('suspeitos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('data_nascimento')->nullable();
            $table->string('documento')->nullable();
            $table->string('tem_tatuagem')->nullable();
            $table->string('qual_tatuagem')->nullable();
            $table->string('tem_deficiencia')->nullable();
            $table->string('qual_deficiencia')->nullable();
            $table->string('cor_raca')->nullable();
            $table->string('tem_passagem')->nullable();
            $table->string('foto')->nullable();
            $table->string('obs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suspeitos');
    }
};
