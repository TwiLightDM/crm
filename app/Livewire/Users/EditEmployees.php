<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserEditForm;
use App\Livewire\Forms\UserPasswordForm;
use App\Livewire\Forms\UserRoleForm;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditEmployees extends Component
{

    public $tryEdit = false;
    public UserEditForm $form;
    public UserPasswordForm $formPassword;
    public UserRoleForm $formRole;
    public $id;


    #[On('edit-user')]
    public function launchEditor($id){
        $this->id = $id;
        $this->form->setForm(User::find($id));
        $this->formRole->setForm(User::find($id));
        $this->tryEdit = true;
    }

    public function edit(){
        $this->form->validate();
        $user = User::find($this->id);
        $user->update($this->form->all());
        session()->flash('edit-info');
    }

    public function editPassword(){
        $this->formPassword->validate();

        $user = User::find($this->id);
        $user->update($this->formPassword->all());

        session()->flash('edit-password');
    }

    public function editRole(){
        $this->formRole->validate();

        $user = User::find($this->id);
        $user->roles()->detach();
        $user->assignRole(Role::where("id", $this->formRole->role_id)->first()->id);

        session()->flash('edit-role');
    }

    public function closeEditor(){
        $this->id = null;
        $this->tryEdit = false;
        $this->form->reset();
        $this->formPassword->reset();
        $this->dispatch('user-editor-closed');
    }

    public function render()
    {
        return view('livewire.users.edit-employees');
    }
}
