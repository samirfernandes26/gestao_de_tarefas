<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnexoTarefa;

class AnexoTarefaSeeder extends Seeder
{

    public function run()
{
    AnexoTarefa::factory()->count(10)->create();
}
}
