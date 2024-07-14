<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'fullname' => 'Carl Llemos',
            'firstname' => 'Carl',
            'lastname' => 'Llemos',
            'image' => 'profile.jpg',
            'email' => 'user01@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'fullname' => 'Janna Rinon',
            'firstname' => 'Janna',
            'lastname' => 'Rinon',
            'image' => 'profile.jpg',
            'email' => 'user02@example.com',
            'password' => Hash::make('password'),
        ]);

    }
}
