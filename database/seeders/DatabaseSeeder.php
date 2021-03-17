<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # Create admin user
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('password');
        $user->save();
    }
}
