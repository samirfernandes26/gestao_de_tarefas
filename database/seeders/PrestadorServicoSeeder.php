<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\PrestadorServico;

class PrestadorServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrestadorServico::factory()->count(5)->create();
    }
}
