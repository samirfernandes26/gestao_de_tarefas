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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->text('descricao');
            $table->foreignId('condominio_id')->constrained('condominios');
            $table->foreignId('prestador_id')->constrained('prestadores_servico');
            $table->date('data_manutencao');
            $table->integer('prazo_meses')->nullable();
            $table->enum('prioridade', ['Alta', 'Média', 'Baixa']);
            $table->enum('status', ['Não iniciada', 'Em andamento', 'Em execução', 'Concluída']);
            $table->enum('situacao', ['Em dia', 'Atrasado']);
            $table->integer('repetir_em_meses')->nullable();
            $table->text('observacoes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('usuarios');
            $table->foreignId('updated_by')->nullable()->constrained('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
