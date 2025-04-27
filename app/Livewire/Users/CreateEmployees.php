<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateEmployees extends Component
{
    public $tryCreate;
    public UserForm $form;

    #[On('create-user')]
    public function launchCreator(){
        $this->tryCreate = true;
    }

    public function create(){
        $this->form->validate();

        $user = User::create($this->form->all());
        $user->assignRole(Role::where("id", $this->form->role_id)->first()->id);

        $this->closeEditor();
    }
    
    public function closeEditor(){
        $this->tryCreate = false;
        $this->form->reset();
        $this->dispatch('user-creator-closed');
    }
    public function render()
    {
        return view('livewire.users.create-employees');
    }
}
