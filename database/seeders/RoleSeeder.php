<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'сотрудники (чтение)']);
        Permission::create(['name' => 'сотрудники (редактирование)']);
        Permission::create(['name' => 'сотрудники (удаление)']);
        Permission::create(['name' => 'сотрудники (создание)']);

        Permission::create(['name' => 'отделы (чтение)']);
        Permission::create(['name' => 'отделы (редактирование)']);
        Permission::create(['name' => 'отделы (удаление)']);
        Permission::create(['name' => 'отделы (создание)']);

        Permission::create(['name' => 'роли (чтение)']);
        Permission::create(['name' => 'роли (редактирование)']);
        Permission::create(['name' => 'роли (удаление)']);
        Permission::create(['name' => 'роли (создание)']);

        Permission::create(['name' => 'встречи (чтение)']);
        Permission::create(['name' => 'встречи (редактирование)']);
        Permission::create(['name' => 'встречи (удаление)']);
        Permission::create(['name' => 'встречи (создание)']);

        Permission::create(['name' => 'проекты (чтение)']);
        Permission::create(['name' => 'проекты (редактирование)']);
        Permission::create(['name' => 'проекты (удаление)']);
        Permission::create(['name' => 'проекты (создание)']);

        Permission::create(['name' => 'задачи (чтение)']);
        Permission::create(['name' => 'задачи (редактирование)']);
        Permission::create(['name' => 'задачи (удаление)']);
        Permission::create(['name' => 'задачи (создание)']);

        Permission::create(['name' => 'лиды (чтение)']);
        Permission::create(['name' => 'лиды (редактирование)']);
        Permission::create(['name' => 'лиды (удаление)']);
        Permission::create(['name' => 'лиды (создание)']);
    }
}
