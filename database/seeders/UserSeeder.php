<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => config('admin.name', 'Admin'),
            'email' => config('admin.email', 'admin@example.com'),
            'password' => Hash::make(config('admin.password', 'password')),
        ]);
    }
}
