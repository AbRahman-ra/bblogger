<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $role = Role::create(['name' => 'admin']);
        $user = User::create([
            'name' => 'Rashed',
            'email' => 'rashed@filament.com',
            'password' => bcrypt('Aa1234567'),
        ]);
        $user->assignRole($role);
    }
}
