<?php

namespace App\Livewire\Departments;

use App\Livewire\Forms\SearchForm;
use App\Livewire\Forms\SortForm;
use App\Models\Department;
use Livewire\Attributes\On;
use Livewire\Component;

class Departments extends Component
{
    public $del_id = 0;
    public $isClosedEditor;

    public $deleteError;
    public $departments;

    public function mount(){
        $this->isClosedEditor = true;
    }

    public function edit($id){
        $this->isClosedEditor = false;
        $this->dispatch('edit-department', id: $id);
    }

    public function read($id){
        $this->isClosedEditor = false;
        $this->dispatch('read-department', id: $id);
    }

    public function createDepartment(){
        $this->isClosedEditor = false;
        $this->dispatch('create-department');
    }

    public function try2Delete($id){
        if (Department::find($id)->users()->count() > 0) $this->deleteError = true;
        else $this->del_id = $id;
    }

    public function discardError(){
        $this->deleteError = false;
    }

    public function discardDelete(){
        $this->del_id = 0;
    }

    public function acceptDelete(){
        Department::find($this->del_id)->delete();
        $this->discardDelete();
    }

    #[On('department-editor-closed')]
    #[On('department-reader-closed')]
    public function closeEditor(){
        $this->isClosedEditor = true;
    }
    public function render()
    {
        $this->departments = Department::get();

        return view('livewire.departments.departments');
    }
}
