<?php

namespace Database\Seeders;

use App\Models\UserHobby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UserHobby::factory()->count(20)->create();
    }
}
