<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LogAlteracao;

class LogAlteracaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LogAlteracao::factory()->count(15)->create();
    }
}
