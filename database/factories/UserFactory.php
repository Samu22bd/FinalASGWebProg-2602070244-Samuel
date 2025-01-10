<?php

namespace Database\Factories;

use App\Models\Hobby;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();

        $genders = ['male', 'female'];
        $randomGender = Arr::random($genders);

        $hobby = Hobby::pluck('name')->toArray();
        $randomHobbies = Arr::random($hobby, random_int(3, count($hobby)));
        
        $insta = "http://www.instagram.com/";
        $username = $faker->userName();
        $instaUn = $insta . $username;

        $mobile = $faker->numerify('############');

        $birthDate = $faker->dateTimeBetween('-80 years', '-13 years');

        $age = random_int(13, 80);

        $coins = random_int(100, 500);
        return [
            //
            'email' => $faker->email(),
            'name' => $faker->name(),
            'gender' => $randomGender,
            'instagram_username' => $instaUn,
            'password' => Hash::make('password'),
            'coins' => $coins,
            'mobile_number' => $mobile,
            'birth_date' => $birthDate,
            'avatar_id' => NULL,
            'is_visible' => 1,
        ];
    }
}
