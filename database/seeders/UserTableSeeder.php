<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
                    //admin
                    [
                        'name' => 'Admin',
                        'username' => 'admin',
                        'email' => 'admin@gmail.com',
                        'password' => Hash::make('111'),
                        'role' => 'admin',
                        'status' => '1',
                    ],
                    
                    //jpmpp
                    [
                        'name' => 'Dr Oppie',
                        'username' => 'Oppie',
                        'email' => 'droppie@gmail.com',
                        'password' => Hash::make('111'),
                        'role' => 'jpmpp',
                        'status' => '1',
                    ],
                    
                    //candidate
                    [
                        'name' => 'Mike',
                        'username' => 'mike',
                        'email' => 'mike@gmail.com',
                        'password' => Hash::make('111'),
                        'role' => 'candidate',
                        'status' => '1',
                    ],
        
                    //user
                    [
                        'name' => 'Harvey',
                        'username' => 'harvey',
                        'email' => 'harvey@gmail.com',
                        'password' => Hash::make('111'),
                        'role' => 'voter',
                        'status' => '1',
                    ],
        
                ]);
    }
}
