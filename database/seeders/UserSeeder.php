<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'user-biasa',
            'email'     => 'user@email.co',
            'role'      => 'USER',
            'password'  => \bcrypt('password.user')
        ]);
    }
}
