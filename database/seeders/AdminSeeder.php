<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Profil::create([
            'nom' => 'Admin',
            'email' => 'admin@zonegames.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
        ]);
    }
}
