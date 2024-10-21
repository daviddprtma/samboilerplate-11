<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // Insert users
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@boilerplate.com',
                'password' => Hash::make('password123'),
                'is_active' => true,
                'email_verified_at' => Carbon::now(),
                'phone_number' => '0811111111111',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pak Bon Admin',
                'email' => 'admin@boilerplate.com',
                'password' => Hash::make('password123'),
                'is_active' => true,
                'email_verified_at' => Carbon::now(),
                'phone_number' => '0811111111111',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Si Tegar Supervisor',
                'email' => 'supervisor@boilerplate.com',
                'password' => Hash::make('password123'),
                'is_active' => true,
                'email_verified_at' => Carbon::now(),
                'phone_number' => '0811111111111',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sam Didi Operator',
                'email' => 'operator@boilerplate.com',
                'password' => Hash::make('password123'),
                'is_active' => true,
                'email_verified_at' => Carbon::now(),
                'phone_number' => '0811111111111',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sam Toni User',
                'email' => 'user@boilerplate.com',
                'password' => Hash::make('password123'),
                'is_active' => true,
                'email_verified_at' => Carbon::now(),
                'phone_number' => '0811111111111',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


        ];

        DB::table('users')->insert($users);


    }
}
