<?php

namespace Database\Factories;

use App\Models\Hobby;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserHobby>
 */
class UserHobbyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::pluck('id')->toArray();
        $hobby = Hobby::pluck('id')->toArray();

        $randUser = Arr::random($user);
        $randHobby = Arr::random($hobby);
        
        return [
            //
            'user_id' => $randUser,
            'hobby_id' => $randHobby,
        ];
    }
}
