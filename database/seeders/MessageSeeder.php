<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\MessageRecepient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = FakerFactory::create();

        Message::insert([
            [
                'sender_id' => 1,
                'content' => $faker->text(),
            ],
            [
                'sender_id' => 2,
                'content' => $faker->text(),
            ],
            [
                'sender_id' => 3,
                'content' => $faker->text(),
            ],
            [
                'sender_id' => 4,
                'content' => $faker->text(),
            ],
            [
                'sender_id' => 5,
                'content' => $faker->text(),
            ],
        ]);

        MessageRecepient::insert([
            [
                'message_id' => 1,
                'receiver_id' => 2,
                'is_read' => 0,
            ],
            [
                'message_id' => 2,
                'received_id' => 3,
                'is_read' => 0,
            ],
            [
                'message_id' => 3,
                'received_id' => 2,
                'is_read' => 0,
            ],
            [
                'message_id' => 4,
                'received_id' => 2,
                'is_read' => 0,
            ],
            [
                'message_id' => 5,
                'received_id' => 2,
                'is_read' => 0,
            ],
        ]);
    }
}
