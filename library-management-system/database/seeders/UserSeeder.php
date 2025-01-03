<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\User::factory()->count(18)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => True,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Pragya',
            'email' => 'pragya@gmail.com',
            'password' => Hash::make('123456789'),
            'is_admin' => False,
        ]);
    }
}
