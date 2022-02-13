<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Administrator";
        $user->username = "Administrator1";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('12345678');
        $user->address = "Jonggol";
        $user->role ="Admin";
        $user->save();
    }
}
