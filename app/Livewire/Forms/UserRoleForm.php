<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class UserRoleForm extends Form
{
    #[Validate('numeric')]
    #[Validate('min:1', message: 'Выберите роль')]
    public $role_id = 0;

    public function setForm($user){
        $this->role_id = Role::where('name', $user->getRoleNames()[0])->first()->id;
    }
}
