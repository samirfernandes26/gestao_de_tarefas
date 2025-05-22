<?php

namespace Database\Factories;

use App\Models\TarefaStatusLog;
use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TarefaStatusLog>
 */
class TarefaStatusLogFactory extends Factory
{
    protected $model = TarefaStatusLog::class;
    public function definition(): array
    {
        $status = ['Não iniciada', 'Em andamento', 'Em execução', 'Concluída'];
        $status_anterior = $this->faker->randomElement($status);
        $status_novo = $this->faker->randomElement(array_diff($status, [$status_anterior]));

        return [
            'tarefa_id' => Tarefa::inRandomOrder()->first()?->id ?? 1,
            'status_anterior' => $status_anterior,
            'status_novo' => $status_novo,
            'alterado_por' => User::inRandomOrder()->first()?->id ?? 1,
      
        ];
    }
}
