<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComentarioTarefa;    
use App\Models\User;

class ComentarioTarefaSeeder extends Seeder
{
    public function run(): void
    {
        ComentarioTarefa::factory()->count(10)->create([
            'usuario_id' => User::inRandomOrder()->first()?->id ?? 1,
        ]);
    }
}
