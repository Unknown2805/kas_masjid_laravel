<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@kas.taruna',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole('admin');

        $bendahara = User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@kas.taruna',
            'password' => bcrypt('password')
        ]);

        $bendahara->assignRole('bendahara');
    }
}
