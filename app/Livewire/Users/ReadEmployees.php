<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ReadEmployees extends Component
{
    public $user;

    #[On('read-user')]
    public function launchCreator($id){
        $this->user = User::find($id);
    }

    public function close(){
        $this->user = null;
        $this->dispatch('user-reader-closed');
    }
    public function render()
    {
        return view('livewire.users.read-employees');
    }
}
