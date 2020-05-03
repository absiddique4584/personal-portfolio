<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUsersSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin22@gmail.com',
                'is_admin'=>'1',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'User',
                'email'=>'user22@gmail.com',
                'is_admin'=>'0',
                'password'=> bcrypt('12345678'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
