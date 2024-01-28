<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;


// $table->id();
// $table->string('name');
// $table->string('userName')->nullable();
// $table->string('email')->unique();
// $table->string('phoneNo')->unique();
// $table->timestamp('email_verified_at')->nullable();
// $table->string('photo')->nullable();
// $table->string('address')->nullable();

// $table->enum('status', ['active' , 'inactive'])->default('active');
// $table->enum('role', ['admin' , 'user' , 'agent'])->default('user');

// $table->string('password');
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' =>"Admin",
                'userName' => 'admin',
                'email' => 'admin@gmail.com',
                'phoneNo' => '9955112233',
                'status' => 'active',
                'role' => 'admin',
                'password' => Hash::make('111'),


            ],
            [
                'name' =>"Agent",
                'userName' => 'agent',
                'email' => 'agent@gmail.com',
                'phoneNo' => '9966112233',
                'status' => 'active',
                'role' => 'agent',
                'password' => Hash::make('111'),


            ],
            [
                'name' => "Atul kumar",
                'userName' => 'atul@kumar',
                'email' => 'atul@gmail.com',
                'phoneNo' => '9955582233',
                'status' => 'active',
                'role' => 'user',
                'password' => Hash::make('111'),


            ],



        ]);
    }
}

