<?php

namespace App\Livewire\Departments;

use App\Models\Department;
use Livewire\Attributes\On;
use Livewire\Component;

class ReadDepartments extends Component
{
    public $department;

    #[On('read-department')]
    public function launchCreator($id){
        $this->department = Department::find($id);
    }

    public function close(){
        $this->department = null;
        $this->dispatch('department-reader-closed');
    }
    
    public function render()
    {
        return view('livewire.departments.read-departments');
    }
}
