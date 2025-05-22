<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Condominio;

class CondominioSeeder extends Seeder
{
    
    public function run(): void
    {
        Condominio::factory()
            ->count(10)
            ->create([
                'created_by' => \App\Models\User::inRandomOrder()->first()?->id ?? 1,
                'updated_by' => \App\Models\User::inRandomOrder()->first()?->id ?? 1,
            ]);
    }
}
