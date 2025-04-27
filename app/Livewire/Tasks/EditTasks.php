<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class EditTasks extends Component
{
    public $tryEdit = false;
    public TaskForm $form;
    public $id;


    #[On('edit-task')]
    public function launchEditor($id){
        $this->id = $id;
        $this->form->setForm(Task::find($id));
        $this->tryEdit = true;
    }

    public function edit(){
        $this->form->validate();
        $user = Task::find($this->id);

        if ($this->form->status == 'Новая' || $this->form->user_id == '') $this->form->user_id = null;
        $user->update($this->form->all());
        session()->flash('edit-info');
    }

    public function closeEditor(){
        $this->id = null;
        $this->tryEdit = false;
        $this->form->reset();
        $this->dispatch('task-editor-closed');
    }
    public function render()
    {
        return view('livewire.tasks.edit-tasks');
    }
}
