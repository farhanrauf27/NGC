<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
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
               'name'=>'Ehtasham',
               'email'=>'ehtasham@gmail.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('admin'),
            ],
            [
               'name'=>'Manager',
               'email'=>'manager@gamil.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}