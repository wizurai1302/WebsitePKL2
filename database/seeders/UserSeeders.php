<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $User = [
            [
                'name' => 'Admin',
                'nisn' => '123',
                'role' => 'Admin',
                'password' => bcrypt('123'),
            ],
        ];

        foreach ($User as $user) {
            User::create($user);
        }
    }
}
