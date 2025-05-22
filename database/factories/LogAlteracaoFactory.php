<?php

namespace Database\Factories;

use App\Models\LogAlteracao;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LogAlteracao>
 */
class LogAlteracaoFactory extends Factory
{
    protected $model = LogAlteracao::class;
    public function definition(): array
    {
        return [
            'tabela_afetada' => $this->faker->randomElement(['tarefas', 'usuarios', 'condominios']),
            'registro_id' => $this->faker->numberBetween(1, 100),
            'operacao' => $this->faker->randomElement(['INSERT', 'UPDATE', 'DELETE']),
            'usuario_id' => User::inRandomOrder()->first()?->id ?? 1,
            'data_hora' => now(),
            'dados_anteriores' => ['campo' => 'valor_antigo'],
            'dados_novos' => ['campo' => 'valor_novo'],
        ];
    }
}
