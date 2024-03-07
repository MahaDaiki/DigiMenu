<?php

namespace Database\Seeders;

use App\Models\Opperateur;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpperateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $user = User::create( [
            'name' => 'Opperateur',
            'email' => 'opperateur@gmail.com',
            'email_verified_at' => now(),
            
            'password' => bcrypt('password'),
            
        ]);
        $opperateur = Opperateur::create([
            'user_id' => $user->id,
            'restaurant_id' => null,
          
        ]);
        $user->assignRole('opperateur');

    }
}
