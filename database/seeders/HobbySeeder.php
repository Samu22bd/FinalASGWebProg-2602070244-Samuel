<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Hobby::insert([
            ['name' => 'Gaming'],
            ['name' => 'Drawing'],
            ['name' => 'Photography'],
            ['name' => 'Fishing'],
            ['name' => 'Hiking'],
            ['name' => 'Gardening'],
            ['name' => 'Cycling'],
            ['name' => 'Running'],
            ['name' => 'Tennis'],
            ['name' => 'Swimming'],
        ]);
    }
}
