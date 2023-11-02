<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $users =User::create([
                'user_name' => 'John-Admin',
                'email' => 'test@gmail.com',
                'password' => Hash::make('password'),
                'gender' => 'male',
                'mobile_number' => '9047771123',
                // 'role' => 'Admin',
        ]);
        $users->assignRole('Admin');
    }
}
