<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'admin-katalog',
            'email'     => 'katalog@email.co',
            'role'      => 'SELLER',
            'no_whatsapp'   => '62837463943',
            'password'  => \bcrypt('password.admin')
        ]);
    }
}
