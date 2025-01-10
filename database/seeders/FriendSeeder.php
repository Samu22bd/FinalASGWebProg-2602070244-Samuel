<?php

namespace Database\Seeders;

use App\Models\Friend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //        
        for ($j=2; $j < 6; $j++) { 
            Friend::create([
                'user_id' => 1,
                'friend_id' => $j,
                'accepted' => 1,
            ]);
        }
    }
}
