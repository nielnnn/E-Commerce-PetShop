<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'nohp' => '08235237364',
            'password' => Hash::make('1234'),
            'alamat' => 'jl maju jaya',
            'level' => 1
        ]);
        User::create([
            'name' => 'pembeli 1',
            'email' => 'pembeli1@gmail.com',
            'nohp' => '08235217364',
            'password' => Hash::make('password'),
            'alamat' => 'jl jakarta',
            'level' => 0
        ]);
        User::create([
            'name' => 'pembeli 2',
            'email' => 'pembeli2@gmail.com',
            'nohp' => '08235237324',
            'password' => Hash::make('password'),
            'alamat' => 'jl depok',
            'level' => 0
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
