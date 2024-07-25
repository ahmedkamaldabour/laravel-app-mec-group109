<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function bcrypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::where('email', 'admin@admin.com')->doesntExist()) {
            User::query()->create([
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456'),
                'is_super_admin' => true,
                'phone' => '1234567890',
                'address' => 'Demo Address',
            ]);
        }

        User::factory(20)->create();
    }
}
