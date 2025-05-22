<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Condominio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Condominio>
 */
class CondominioFactory extends Factory
{
    protected $model = Condominio::class;
    public function definition(): array
    {
        return [
            'nome' => $this->faker->company,
            'endereco' => $this->faker->address,
            'responsavel' => $this->faker->name,
            'contato' => $this->faker->phoneNumber,
            'created_by' => User::inRandomOrder()->first()?->id ?? 1,
            'updated_by' => User::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
