<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notificacao;
use App\Models\User;

class NotificacaoSeeder extends Seeder
{
    public function run(): void
    {
        Notificacao::factory()->count(20)->create([
            'usuario_id'=> User::inRandomOrder()->first()?->id ?? 1, // Substitua pelo ID do usuário desejado
        ]);
    }
}
