<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class ReadTasks extends Component
{
    public $task;

    #[On('read-task')]
    public function launchCreator($id){
        $this->task = Task::find($id);
    }

    public function close(){
        $this->task = null;
        $this->dispatch('task-reader-closed');
    }
    public function render()
    {
        return view('livewire.tasks.read-tasks');
    }
}
