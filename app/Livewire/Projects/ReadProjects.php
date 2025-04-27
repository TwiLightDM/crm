<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class ReadProjects extends Component
{
    public $project;

    #[On('read-project')]
    public function launchCreator($id){
        $this->project = Project::find($id);
    }

    public function close(){
        $this->project = null;
        $this->dispatch('project-reader-closed');
    }
    public function render()
    {
        return view('livewire.projects.read-projects');
    }
}
