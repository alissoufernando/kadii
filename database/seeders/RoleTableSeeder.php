<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {


        Role::create(['nom' => 'Administrateur']);
        Role::create(['nom' => 'utilisateur']);
        Role::create(['nom' => 'Super Administrateur']);

    }
}
