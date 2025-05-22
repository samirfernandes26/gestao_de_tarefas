<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Notificacao;
use App\Models\user;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notificacao>
 */
class NotificacaoFactory extends Factory
{
    protected $model = Notificacao::class;

    public function definition(): array
    {
        return [
            'usuario_id' => User::inRandomOrder()->first()?->id ?? 1,
            'titulo' => $this->faker->sentence,
            'mensagem' => $this->faker->paragraph,
            'lida' => $this->faker->boolean,
        ];
    }
}
