<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        if (empty($user)) {
            User::create([
                'name' => 'User1',
                'email' => 'user1@user.com',
                'password' => Hash::make('123456')
            ]);
        }
    }
}
