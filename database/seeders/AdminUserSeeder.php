<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'role' => 'admin',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@example.com',
            'phone_number' => '09673475929',
            'password' => Hash::make('12345678'), // Change to a secure password
            'profile_image_url' => null,
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'last_login_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
