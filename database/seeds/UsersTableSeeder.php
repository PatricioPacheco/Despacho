<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'phone' => '0990289167',
            'password' => bcrypt('user1234'),
            'email_verified_at' => '2020-10-28 22:10:32',
            'role' => 0
        ]);

        DB::table('users')->insert([
            'name' => 'Empleado',
            'email' => 'empleado@gmail.com',
            'phone' => '0990289167',
            'password' => bcrypt('user1234'),
            'email_verified_at' => '2020-10-28 22:10:32',
            'role' => 1
        ]);

        
    }
}
