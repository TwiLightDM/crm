<?php

namespace App\Livewire\Roles;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public $del_id = 0;
    public $isClosedEditor;
    public $deleteError;
    public $roles;
    
    public function mount(){
        $this->isClosedEditor = true;
    }

    public function edit($id){
        $this->isClosedEditor = false;
        $this->dispatch('edit-role', id: $id);
    }

    public function read($id){
        $this->isClosedEditor = false;
        $this->dispatch('read-role', id: $id);
    }

    public function createRole(){
        $this->isClosedEditor = false;
        $this->dispatch('create-role');
    }

    public function try2Delete($id){
        if (Role::select('roles.*')
            ->join('model_has_roles','model_has_roles.role_id','=','roles.id')
            ->join('users','users.id','=','model_has_roles.model_id')
            ->where('roles.id',$id)
            ->count() > 0) $this->deleteError = true;
        else $this->del_id = $id;
    }

    public function discardError(){
        $this->deleteError = false;
    }

    public function discardDelete(){
        $this->del_id = 0;
    }

    public function acceptDelete(){
        Role::find($this->del_id)->delete();
        $this->discardDelete();
    }

    #[On('role-editor-closed')]
    #[On('role-reader-closed')]
    public function closeEditor(){
        $this->isClosedEditor = true;
    }

    public function render()
    {
        $this->roles = Role::get();
        return view('livewire.roles.roles');
    }
}
