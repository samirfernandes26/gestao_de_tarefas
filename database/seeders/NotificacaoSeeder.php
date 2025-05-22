<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notificacao;

class NotificacaoSeeder extends Seeder
{
    public function run(): void
    {
        Notificacao::factory()->count(20)->create();
    }
}
