<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Supervisor',
            'email'     => 'supervisor@email.co',
            'role'      => 'SUPERVISOR',
            'no_whatsapp'   => '5494904340943',
            'password'  => \bcrypt('password.supervisor')
        ]);
    }
}
