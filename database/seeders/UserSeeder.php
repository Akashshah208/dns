<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'user_type' => 'admin',
                'email' => 'admin@admin.com',
                'contact_no' => '0123456789',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($users as $user) {

            $userObj = new User();
            $userObj->name = $user['name'];
            $userObj->user_type = $user['user_type'];
            $userObj->email = $user['email'];
            $userObj->contact_no = $user['contact_no'];
            $userObj->password = $user['password'];
            $userObj->save();

        }
    }
}
