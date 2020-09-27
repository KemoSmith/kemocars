<?php

use App\User;
use Illuminate\Database\Seeder;

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
            "johndoe@example.com" => [
                "name" => "John Doe",
                "password" => bcrypt("1234567890")
            ],
            "iceberg@example.com" => [
                "name" => "Ice Berg",
                "password" => bcrypt("1234567890")
            ],
            "janedoe@example.com" => [
                "name" => "Jane Doe",
                "password" => bcrypt("1234567890")
            ],
            "BlueJohn@example.com" => [
                "name" => "Blue John",
                "password" => bcrypt("1234567890")
            ],
        ];

        foreach ($users as $userEmail => $userInfo) {
            $user = User::create([
                "email" => $userEmail,
                "name" => $userInfo["name"],
                "password" => $userInfo["password"],
            ]);

            $user->contact_info()->create([
                "type" => "email",
                "info" => $userEmail,
            ]);

            $user->contact_info()->create([
                "type" => "work",
                "info" => "2222222",
            ]);
        }
    }
}
