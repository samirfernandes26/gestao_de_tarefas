<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AnexoTarefaSeeder::class,
            ComentarioTarefaSeeder::class,
            CondominioSeeder::class,
            LogAlteracaoSeeder::class,
            NotificacaoSeeder::class,
            PrestadorServicoSeeder::class,
            TarefaSeeder::class,
            TarefaStatusLogSeeder::class,
            UserSeeder::class,    
        ]);

        
    }
}
