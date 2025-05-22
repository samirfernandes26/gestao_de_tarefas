<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComentariosTarefa;

class ComentarioTarefaSeeder extends Seeder
{
    public function run(): void
    {
        ComentariosTarefa::factory()->count(20)->create();
    }
}
