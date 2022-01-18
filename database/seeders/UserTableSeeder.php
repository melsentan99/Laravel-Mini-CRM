<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('password'),
        ]);

        User::create([
            'name'      => 'Admin2',
            'email'     => 'admin2@admin.com',
            'password'  => bcrypt('password2'),
        ]);

        User::create([
            'name'      => 'Admin3',
            'email'     => 'admin3@admin.com',
            'password'  => bcrypt('password3'),
        ]);
    }
}
