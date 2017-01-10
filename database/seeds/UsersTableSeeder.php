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

            array ('firstname'=> 'Admin',
                'lastname'=> 'test',
                'email'=> 'test@test.com',
                'password'=> bcrypt('test123'),
                'county'=> 'Nairobi',
                'is_admin'=> 1,
                'phone_number' => '',
                'headoffice' => '',
                'reportsto' => '',
                'supervisor_phone' => ''),

            array ('firstname'=> 'Murima',
                'lastname'=> 'test',
                'email'=> 'murima@gmail.com',
                'password'=> bcrypt('test123'),
                'county'=> 'Nairobi',
                'is_official'=> 1,
                'phone_number' => '',
                'headoffice' => '',
                'reportsto' => '',
                'supervisor_phone' => ''),

            array ('firstname'=> 'Enumerator',
                'lastname'=> 'Macharia',
                'email'=> 'enumerator@gmail.com',
                'password'=> bcrypt('enum123'),
                'county'=> 'Nairobi',
                'is_enumerator'=> 1,
                'phone_number' => '0723563998',
                'headoffice' => 'Nairobi',
                'reportsto' => 'Mr Kimathi',
                'supervisor_phone' => '0738665450'),
        ]);

    }
}
