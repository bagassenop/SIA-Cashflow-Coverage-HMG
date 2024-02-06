<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Akunting',
            'email' => 'akunting@gmail.com',
            'password' => bcrypt('akunting'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Finance',
            'email' => 'Finance@gmail.com',
            'password' => bcrypt('finance'),
            'role' => 'user'
        ]);
    }
}
