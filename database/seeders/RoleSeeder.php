<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission; // Ensure this is imported if you use it later

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the 'Admin' role if it doesn't exist
        $adminRole = Role::firstOrCreate(
            ['name' => 'Admin'], // This is the unique key for finding/creating
            [
                'display_name' => 'Administrator', // ADD THIS LINE
                'description' => 'Super Administrator with full system access.',
                'created_by_user_id' => null, // ADD THIS LINE, as it's now nullable in migration
                // You can add other default values here if needed, e.g., 'is_default' => 1
            ]
        );
    }
}