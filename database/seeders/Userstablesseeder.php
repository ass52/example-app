<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class Userstablesseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Ayush',
            'email' => 'ayush@gmail.com',
            'Password'=> Hash::make('password'),
            'remimber_token'=> str_random(10),

        ]);
    }
}