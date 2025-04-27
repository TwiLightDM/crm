<?php

namespace App\Livewire\Roles;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ReadRoles extends Component
{
    public $role;
    public $permissions = [];

    #[On('read-role')]
    public function launchCreator($id){
        $this->role = Role::find($id);

        $names = Permission::all();
        foreach($names as $name){
            $this->permissions[$name->name] = $this->role->hasPermissionTo($name->name);
        }
    }

    public function close(){
        $this->role = null;
        $this->dispatch('role-reader-closed');
    }
    public function render()
    {
        return view('livewire.roles.read-roles');
    }
}
