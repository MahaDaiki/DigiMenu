<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'user']);
        Role::create(['name' => 'opperateur']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'owner']);
        Role::create(['name' => 'sub_admin']);
       
    }
}
