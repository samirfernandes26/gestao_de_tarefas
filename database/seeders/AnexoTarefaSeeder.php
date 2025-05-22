<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnexoTarefa;

class AnexoTarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnexoTarefa::factory()->count(15)->create();
    }
}
