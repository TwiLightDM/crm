<?php

namespace App\Livewire\Roles;

use App\Livewire\Forms\RoleForm;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditRoles extends Component
{
    public $tryDelete;
    public $deleteError;
    public $tryEditOrCreate;
    public RoleForm $form;
    public $id;


    #[On('edit-role')]
    public function launchEditor($id){
        $this->id = $id;
        $this->form->setForm(Role::find($id));
        $this->tryEditOrCreate = true;
    }

    #[On('create-role')]
    public function launchCreator(){
        $this->form->setDefaultForm();
        $this->tryEditOrCreate = true;      
    }

    private function setPermisstionToRole($role){
        $permissions = $this->form->permissions;
        $roles = [];

        foreach($permissions as $name => $value){
                if($value){
                    array_push($roles, $name);
                }
        }

        if(count($roles) != 0){
            $role->syncPermissions($roles);
        }
    }

    public function editOrCreate(){
        $this->form->validate();
        $role = null;

        if ($this->id != null){
            $role = Role::find($this->id);
            $role->update(['name' => $this->form->name]);
            $this->setPermisstionToRole($role);
            session()->flash('edit-info');
        }
        else{
            $role = Role::create(['name' => $this->form->name]);
            $this->setPermisstionToRole($role);
            $this->closeEditor();
        }
    }

    public function closeEditor(){
        $this->id = null;
        $this->tryEditOrCreate = false;
        $this->form->reset();
        $this->dispatch('role-editor-closed');
    }

    public function try2Delete(){
        $r = Role::find($this->id);
        foreach(User::all() as $user){
            if ($user->hasRole($r->name)){
                $this->deleteError = true;
                return;
            }
        }
        $this->tryDelete = true;
    }

    public function discardError(){
        $this->deleteError = false;
    }

    public function discardDelete(){
        $this->tryDelete = false;
    }

    public function acceptDelete(){
        Role::find($this->id)->delete();
        $this->discardDelete();
        $this->closeEditor();
    }
    public function render()
    {
        return view('livewire.roles.edit-roles');
    }
}
