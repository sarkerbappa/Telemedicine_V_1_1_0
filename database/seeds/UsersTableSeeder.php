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

       DB::table('users')->insert([
            'f_name'          => 'Bappa',
            'l_name'          => 'Sarker',
            'gender'          => 'male',
            'bloodgroup'      => 'o+',
            'nidno'           => '10345678901234567',
            'about'           => 'hfghjgj',
            'image'           => 'bappa.jpg',
            'username'        => 'admin',
            'email'           => 'bappa@tech-novelty.com',
            'password'        => Hash::make('123456'),
            'mobile'          => '01716342179',
            'role'            => 'admin',
            'status'          => '1',
            'mailconfirm'    => '1'
        ]);
    }
}
