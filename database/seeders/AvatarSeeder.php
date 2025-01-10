<?php

namespace Database\Seeders;

use App\Models\Avatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Avatar::insert([
            [
                'name' => 'bear1',
                'price' => 50,
                'file_path' => 'avatars/bear1.jpg',
            ],
            [
                'name' => 'bear2',
                'price' => 75,
                'file_path' => 'avatars/bear2.jpg',
            ],
            [
                'name' => 'bear3',
                'price' => 100,
                'file_path' => 'avatars/bear3.jpg',
            ],
            [
                'name' => 'bear4',
                'price' => 125,
                'file_path' => 'avatars/bear4.jpg',
            ],
            [
                'name' => 'bear5',
                'price' => 150,
                'file_path' => 'avatars/bear5.jpg',
            ],
            [
                'name' => 'Elysia1',
                'price' => 1000,
                'file_path' => 'avatars/elysia1.jpg',
            ],
            [
                'name' => 'Elysia2',
                'price' => 1250,
                'file_path' => 'avatars/elysia2.jpg',
            ],
            [
                'name' => 'Elysia3',
                'price' => 1500,
                'file_path' => 'avatars/elysia3.jpg',
            ],
        ]);
    }
}
