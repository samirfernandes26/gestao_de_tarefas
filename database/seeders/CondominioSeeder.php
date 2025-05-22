<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Condominio;
use App\Models\User;

class CondominioSeeder extends Seeder
{
    
    public function run(): void
    {
        Condominio::factory()
            ->count(10)
            ->create([
                'created_by' => User::inRandomOrder()->first()?->id ?? 1,
                'updated_by' => User::inRandomOrder()->first()?->id ?? 1,
            ]);
    }
}
