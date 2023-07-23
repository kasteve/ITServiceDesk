<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $moderatorRole = Role::create(['name' => 'moderator']);
        $regularUserRole = Role::create(['name' => 'regular user']);

        // Assign roles to users
        $adminUser = User::find(1); // Assuming you have an admin user with ID 1
        $adminUser->roles()->attach($adminRole);

        $moderatorUser = User::find(2); // Assuming you have a moderator user with ID 2
        $moderatorUser->roles()->attach($moderatorRole);

        // Assign multiple roles to a user
        $regularUser = User::find(3); // Assuming you have a regular user with ID 3
        $regularUser->roles()->attach([$regularUserRole->id, $moderatorRole->id]);
    }
}

