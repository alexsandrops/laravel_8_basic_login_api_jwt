<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $password = '123456789';
        User::create([
            'email' => 'teste_token@teste.com',
            'password' => Hash::make($password)
        ]);
    }
}
