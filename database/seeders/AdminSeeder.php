<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $godUser = User::create([
            'name' => 'Админ',
            'surname' => 'Админ',
            'patronymic' => 'Админ',
            'department_id' => null,
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'blocked' => false,
        ]);

        Role::create([
            'name' => 'super-admin',
        ]);

        $godUser->assignRole('super-admin');
    }
}
