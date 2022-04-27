<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * 
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
    'name' => 'admin',
    'address'=> 'Alcoy',
    'phone_number'=>'09123456789',
    'gender'=>'Male',
    'username' => 'resty.admin',
    'status' => 'enable',
    'type' => 'ADMIN',
    'password' => Hash::make('password'),
  ]);
  
    }
}
