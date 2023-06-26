<?php

namespace Database\Seeders;

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
        $user = [
            [
                'name'=>'Super Ahma',
                'email'=>'superadmin@etics.com',
                'is_superadmin'=>'1',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Admin Afrizal',
                'email'=>'admin@etics.com',
                'is_superadmin'=>'0',
                'is_admin'=>'1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Ahma Afrizal',
                'email'=>'user@etics.com',
                'is_superadmin'=>'0',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
