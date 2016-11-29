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
        //seeding the users table used by sign up form
        DB::table('users')->insert([

            'firstname'=> 'Admin',
            'lastname'=> 'test',
            'email'=> 'test@test.com',
            'password'=> bcrypt('test123'),
            'county'=> 'Nairobi',

        ]);

    }
}
