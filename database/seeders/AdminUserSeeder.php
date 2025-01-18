<?php

// database/seeders/AdminUserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Check if the admin user already exists
        if (User::where('email', 'mikidebesaw@gmail.com')->doesntExist()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'mikidebesaw@gmail.com',
                'password' => Hash::make('password123'),  // Change the password as needed
            ]);
        }
    }
}
