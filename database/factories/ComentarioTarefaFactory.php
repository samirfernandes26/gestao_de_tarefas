<?php

namespace Database\Factories;

use App\Models\ComentariosTarefa;
use App\Models\Tarefa;
use App\Models\user;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComentariosTarefa>
 */
class ComentarioTarefaFactory extends Factory
{
    protected $model = ComentariosTarefa::class;

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
