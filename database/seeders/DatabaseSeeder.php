<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // user_tickets seeder
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@rorotik.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),

        ]);
        $admin->assignRole('Admin');
        $user = User::create([
            'name' => 'Cafe User',
            'email' => 'user@rorotik.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'vendor_id' => 1,

        ]);
        $user->assignRole('User');
        $this->call(UserTicketSeeder::class);
    }
}
