<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin",
            "username" => "admin",
            "email" => "admin@localhost",
            "password" => Hash::make("password"),
            "email_verified_at" => now(),
            "remember_token" => Str::random(10),
        ]);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}
