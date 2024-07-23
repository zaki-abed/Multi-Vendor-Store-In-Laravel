<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '55555',
        ]);

        // OR:

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '0123456789',
        ]);
    }
}
