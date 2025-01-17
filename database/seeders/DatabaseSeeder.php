<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tasks;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed 10 tasks using the Task factory
        Tasks::factory()->count(10)->create();
    }
}
