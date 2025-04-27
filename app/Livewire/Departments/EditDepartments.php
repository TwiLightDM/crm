<?php

namespace App\Livewire\Departments;

use App\Livewire\Forms\DepartmentForm;
use App\Models\Department;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class EditDepartments extends Component
{
    public $tryDelete = false;
    public $deleteError = false;
    public $tryEditOrCreate;
    public DepartmentForm $form;
    public $id;

    #[On('edit-department')]
    public function launchEditor($id){
        $this->id = $id;
        $this->form->setData(Department::find($id));
        $this->tryEditOrCreate = true;   
    }

    #[On('create-department')]
    public function launchCreator(){
        $this->tryEditOrCreate = true;   
    }

    public function editOrCreate(){
        $this->form->validate();

        if ($this->id != null){
            $department = Department::find($this->id);
            $department->update($this->form->all());
            session()->flash('edit-info');
        }
        else{
            Department::create($this->form->all());
            $this->closeEditor();
        }
    }

    public function closeEditor(){
        $this->id = null;
        $this->tryEditOrCreate = false;
        $this->form->reset();
        $this->dispatch('department-editor-closed');
    }

    public function try2Delete(){
        if (User::where('department_id','=',$this->id)->count() > 0){
            $this->deleteError = true;
        }
        else {
            $this->tryDelete = true;
        }
    }

    public function discardError(){
        $this->deleteError = false;
    }
    public function discardDelete(){
        $this->tryDelete = false;
    }

    public function acceptDelete(){
        Department::find($this->id)->delete();
        $this->discardDelete();
        $this->closeEditor();
    }
    public function render()
    {
        return view('livewire.departments.edit-departments');
    }
}
