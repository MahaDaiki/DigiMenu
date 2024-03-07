<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\OwnerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {             
<<<<<<< HEAD
        // $this->call(OwnerSeeder::class);
        // $this->call(AdminSeeder::class);
        // $this->call(RoleSeeder::class);
=======
        $this->call(AdminSeeder::class);
        $this->call(OwnerSeeder::class);
       // $this->call(RoleSeeder::class);
>>>>>>> 896c44079a04d4ca3c86328b683277e183d4d63e
    }       

}
