<?php

namespace Database\Factories;

use App\Models\PrestadorServico;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrestadorServico>
 */
class PrestadorServicoFactory extends Factory
{
    protected $model = PrestadorServico::class;
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'area_atuacao' => $this->faker->word,
            'contato' => $this->faker->phoneNumber,
            'observacoes' => $this->faker->sentence,
            'created_by' => User::inRandomOrder()->first()?->id ?? 1,
            'updated_by' => User::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
