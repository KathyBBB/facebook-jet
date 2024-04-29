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
        // User::factory(10)->withPersonalTeam()->create();

        \App\Models\User::factory()->withPersonalTeam()->create([
            'name' => 'Kathy Brennan',
            'email' => 'admin@ablesource.com',
            'password' => bcrypt('111788Kb'),
        ]);
        \App\Models\User::factory()->withPersonalTeam()->create([
            'name' => 'Kathy Brennan',
            'email' => 'kathy.b.brennan@gmail.com',
            'password' => bcrypt('111788Kb'),
        ]);

        \App\Models\User::factory(1000)->withPersonalTeam()->create();

        // User::factory()->withPersonalTeam()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Issue::factory(55)->create();
        \App\Models\Content::factory(1500)->create();
        \App\Models\Group::factory(10)->create();
    }
}
