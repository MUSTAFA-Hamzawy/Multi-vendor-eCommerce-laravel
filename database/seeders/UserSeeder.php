<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // data
        $data = [
            'admin' => [
                'name' => 'Mustafa Hamzawy',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1234'),
                'username' => 'hamzawy1',
                'role' => 'admin',
                'status' => 1]
            ,
            'vendor' => [
                'name' => 'Mustafa Vendor',
                'email' => 'vendor@gmail.com',
                'password' => Hash::make('vendor1234'),
                'username' => 'hamzawy2',
                'role' => 'vendor',
                'status' => 0]
            ,
            'user' => [
                'name' => 'Mustafa User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user1234'),
                'username' => 'hamzawy3',
                'role' => 'user',
                'status' => 0]

        ];

        // seed the db
        foreach ($data as $role => $userData)
            DB::table('users')->insert($userData);
    }
}
