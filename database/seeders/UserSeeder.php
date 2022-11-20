<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name'        => 'Daniel Virguez',
            'phone'        => '6671147',
            'email'       => 'dkinslert@gmail.com',
            'profile'     => 'ADMIN',
            'status'       => 'ACTIVE',
            'password'      => bcrypt('password'),
        ]);
        User::create([
            'name'        => 'Roberto Perez',
            'phone'        => '9562166445',
            'email'       => 'rperez@example.com',
            'profile'     => 'EMPLOYEE',
            'status'       => 'ACTIVE',
            'password'      => bcrypt('password'),
        ]);
    }
}
