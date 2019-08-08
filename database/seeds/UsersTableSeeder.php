<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('12345678'),
                'avatar' => '/images/user-icon.png',
                'status' => 'ACTIVE'
            ]
        ];

        DB::table('users')->insert($users);
    }
}
