<?php

namespace Database\Factories;

use App\Models\Tarefa;
use App\Models\Condominio;
use App\Models\PrestadorServico;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarefa>
 */
class TarefaFactory extends Factory
{
    protected $model = Tarefa::class;

    public function definition(): array
    {
        return [
            'descricao' => $this->faker->sentence,
            'condominio_id' => Condominio::inRandomOrder()->first()?->id ?? 1,
            'prestador_id' => PrestadorServico::inRandomOrder()->first()?->id ?? 1,
            'data_manutencao' => $this->faker->date,
            'prazo_meses' => $this->faker->numberBetween(1, 12),
            'prioridade' => $this->faker->randomElement(['Alta', 'Média', 'Baixa']),
            'status' => $this->faker->randomElement(['Não iniciada', 'Em andamento', 'Em execução', 'Concluída']),
            'situacao' => $this->faker->randomElement(['Em dia', 'Atrasado']),
            'repetir_em_meses' => $this->faker->numberBetween(1, 12),
            'observacoes' => $this->faker->text,
            'created_by' => User::inRandomOrder()->first()?->id ?? 1,
            'updated_by' => User::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
