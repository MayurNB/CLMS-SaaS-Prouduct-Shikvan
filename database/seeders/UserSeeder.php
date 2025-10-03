<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(
            ['name' => 'Admin'],
            [
                'display_name' => 'Administrator',
                'description' => 'Super Administrator with full system access.',
                'status' => 'Active'
            ]
        );

        $systemEmployerRole = Role::firstOrCreate(
            ['name' => 'SystemEmployer'],
            [
                'display_name' => 'System Employer',
                'description' => 'Responsible for maintaining client-side control.',
                'status' => 'Active'
            ]
        );

        // Create first user
        $firstUser = User::firstOrCreate(
            ['email' => 'fu@gmail.com'],
            [
                'name' => 'FirstUser',
                'username' => 'fu',
                'password' => Hash::make('Mayur'),
            ]
        );

        // ✅ Create second admin user
        $secondUser = User::firstOrCreate(
            ['email' => 'mayurnb2003@gmail.com'], // Unique email
            [
                'name' => 'MayurAdmin',
                'username' => 'Admin', // Unique username
                'password' => Hash::make('Mayur'), // Change password
            ]
        );

        // Attach roles via pivot table
        $firstUser->roles()->syncWithoutDetaching([
            $adminRole->role_id,
            $systemEmployerRole->role_id
        ]);
    }
}