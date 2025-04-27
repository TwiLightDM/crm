<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    public $project_id;
    public $user_id;

    #[Validate('required', message: 'Имя не может быть пустым')]
    #[Validate('max:80', message: 'Имя должно составлять не более 80 символов')]
    public $name;

    public $status;


    public function setForm($task){
        $this->project_id = $task->project_id;
        $this->user_id = $task->user_id;
        $this->name = $task->name;
        $this->status = $task->status;
    }

    public function setDefaultForm($id_project){
        $this->project_id = $id_project;
        $this->status = 'Новая';
    }
}
