<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{
    public $id = 0;
    #[Validate('required', message: 'Название роли не может быть пустым')] 
    #[Validate('max:255', message: 'Название роли не более 255 символов')] 
    public $name;

    public $permissions = [];
    
    public function boot()
    {
        $this->withValidator(function ($validator) {
            $validator->after(function ($validator) {
                if (Role::where('id', '<>', $this->id)->where('name', '=', $this->name)->count() > 0) {
                    $validator->errors()->add('name', 'Роль с таким именем уже существует');
                }
            });
        });
    }

    public function setForm($role){
        $this->id = $role->id;
        $this->name = $role->name;
        $names = Permission::all();
        foreach($names as $name){
            $this->permissions[$name->name] = $role->hasPermissionTo($name->name);
        }
    }

    public function setDefaultForm(){ 
        $names = Permission::all();
        foreach($names as $name){
            $this->permissions[$name->name] = false;
        }
    }
}
