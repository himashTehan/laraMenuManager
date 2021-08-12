<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Faker\Factory;
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

        $faker = Factory::Create();

        // get admin and manager from Roles table
        $adminRole = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $viewerRole = Role::where('name', 'viewer')->first();

        //create an admin user
        $admin = User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'Password' => Hash::make('password')
        ]);

        //create a manager user
        $manager = User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'Password' => Hash::make('password')
        ]);        
        
        //create a viewer user
        $viewer = User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'Password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $viewer->roles()->attach($viewerRole);
    }
}
