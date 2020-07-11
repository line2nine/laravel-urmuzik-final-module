<?php

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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'phone' => '0123456789',
            'address' => 'Ha Noi',
            'role' => \App\Http\Controllers\Role::ADMIN,
            'status' => \App\Http\Controllers\Status::ACTIVE,
            'avatar' => 'images/default-avatar.png'
        ]);
    }
}
