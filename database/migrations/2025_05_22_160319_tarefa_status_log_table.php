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
        Schema::create('tarefa_status_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarefa_id')->constrained('tarefas');
            $table->enum('status_anterior', ['Não iniciada', 'Em andamento', 'Em execução', 'Concluída'])->nullable();
            $table->enum('status_novo', ['Não iniciada', 'Em andamento', 'Em execução', 'Concluída']);
            $table->foreignId('alterado_por')->constrained('users');
            $table->timestamp('alterado_em')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefa_status_log');
    }
};
