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
            HobbySeeder::class,
            UserSeeder::class,
            UserHobbySeeder::class,
            FriendSeeder::class,
            MessageSeeder::class,
            AvatarSeeder::class,
        ]);
    }
}
