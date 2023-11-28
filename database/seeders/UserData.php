<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'user',
                'password' => bcrypt('12345'),
                'level' => '1',
                'email' => 'user@example.com',
            ],
            [
                'name' => 'dosen',
                'password' => bcrypt('12345'),
                'level' => '2',
                'email' => 'dosen@example.com',
            ],
            [
                'name' => 'admin',
                'password' => bcrypt('12345'),
                'level' => '3',
                'email' => 'admin@example.com',
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
