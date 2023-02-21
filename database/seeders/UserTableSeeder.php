<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public $roleSuper = 'Super Administrateur';
    public $roleAdmin = 'Administrateur';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'Super',
            'firstname' => 'Administrateur',
            'last_seen' =>  now(),
            'created_at' => now(),
            'email' => 'super@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);


        $adminRole = Role::where('nom', "Super Administrateur")->first();
        $superAdmin->roles()->attach($adminRole);

        $admin = User::create([
            'name' => 'Admin',
            'firstname' => 'Administrateur',
            'last_seen' =>  now(),
            'created_at' => now(),
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $adminRoles = Role::where('nom', 'Administrateur')->first();
        $admin->roles()->attach($adminRoles);
    }
}
