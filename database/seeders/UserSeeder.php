<?php

namespace Database\Seeders;

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
        //
        DB::table('users')->insert([
            'name' => 'Dimas Dwi',
            'email' => 'ddwi673@gmail.com',
            'password' => Hash::make('rahasia123'),
            'role' => 'admin',
        ]);
    }
}
