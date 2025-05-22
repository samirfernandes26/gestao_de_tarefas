<?php

namespace Database\Factories;

use App\Models\ComentarioTarefa;
use App\Models\Tarefa;
use App\Models\user;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComentarioTarefa>
 */
class ComentarioTarefaFactory extends Factory
{
    protected $model = ComentarioTarefa::class;

    public function definition(): array
    {
        return [
            'tarefa_id' => Tarefa::inRandomOrder()->first()?->id ?? 1,
            'usuario_id' => user::inRandomOrder()->first()?->id ?? 1,
            'comentario' => $this->faker->sentence,
            'criado_em' => now(),
        ];
    }
}
