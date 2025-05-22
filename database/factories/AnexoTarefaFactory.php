<?php

namespace Database\Factories;

use App\Models\AnexoTarefa;
use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class AnexoTarefaFactory extends Factory
{
    protected $model = AnexoTarefa::class;


    public function definition(): array
    {
        return [
            'tarefa_id' => Tarefa::inRandomOrder()->first()?->id ?? 1,
            'nome_arquivo' => $this->faker->word . '.pdf',
            'caminho_arquivo' => 'anexos/' . $this->faker->uuid . '.pdf',
            'tipo_arquivo' => 'application/pdf',
            'enviado_por' => User::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
