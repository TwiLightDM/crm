<?php

namespace App\Livewire\Projects;

use App\Livewire\Forms\ProjectForm;
use App\Livewire\Forms\TaskForm;
use App\Models\Project;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class EditProjects extends Component
{

    public $tryDelete;
    public $tryEdit;
    public ProjectForm $form;
    public TaskForm $formTask;
    public $id;


    #[On('edit-project')]
    public function launchEditor($id){
        $this->id = $id;
        $this->form->setForm(Project::find($id));
        $this->formTask->setDefaultForm($id);
        $this->tryEdit = true;
    }

    public function edit(){
        $this->form->validate();

        $project = Project::find($this->id);
        $project->update($this->form->all());

        session()->flash('edit-info');
    }

    public function createTask(){
        $this->formTask->validate();
        Task::create($this->formTask->all());
        $this->closeEditor();
    }


    public function closeEditor(){
        $this->id = null;
        $this->tryEdit = false;
        $this->form->reset();
        $this->formTask->reset();
        $this->dispatch('project-editor-closed');
    }

    public function try2Delete(){
        $this->tryDelete = true;
    }

    public function discardDelete(){
        $this->tryDelete = false;
    }

    public function acceptDelete(){
        Project::find($this->id)->delete();
        $this->discardDelete();
        $this->closeEditor();
    }
    public function render()
    {
        return view('livewire.projects.edit-projects');
    }
}
