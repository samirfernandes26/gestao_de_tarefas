<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\TarefaStatusLog;

class TarefaStatusLogSeeder extends Seeder
{
    
    public function run(): void
    {
        TarefaStatusLog::factory()->count(20)->create();
    }
}
