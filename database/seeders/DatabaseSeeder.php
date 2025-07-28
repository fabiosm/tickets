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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
            'is_admin' => true,
            'is_pending' => false
        ]);

        User::factory()->create([
            'name' => 'Fábio Marcelino',
            'email' => 'fabio_s.m@hotmail.com',
            'password' => bcrypt('123456'),
            'is_admin' => true,
            'is_pending' => false
        ]);
    }
}
