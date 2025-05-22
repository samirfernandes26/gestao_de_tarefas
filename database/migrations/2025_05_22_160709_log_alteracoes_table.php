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
        Schema::create('log_alteracoes', function (Blueprint $table) {
            $table->id();
            $table->string('tabela_afetada');
            $table->unsignedBigInteger('registro_id');
            $table->enum('operacao', ['INSERT', 'UPDATE', 'DELETE']);
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->timestamp('data_hora')->useCurrent();
            $table->json('dados_anteriores')->nullable();
            $table->json('dados_novos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_alteracoes');
    }
};
