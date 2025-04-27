<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ProjectForm extends Form
{
    public $lead_id;

    #[Validate('required', message: 'Укажите имя проекта')]
    #[Validate('max:80', message: 'Имя должно составлять не более 80 символов')]
    public $name;

    #[Validate('required', message: 'Укажите дату встречи')]
    public $date;


    #[Validate('required', message: 'Установите результат встречи')]
    public $status;

    public $switch = false;

    public function setForm($project){
        $this->lead_id = $project->lead_id;
        $this->name = $project->name;
        $this->date = $project->date;
        $this->status = $project->status;
    }

    public function setDefaultForm($lead_id) {
        $this->lead_id = $lead_id;
        $this->status = 'Создан';
    }
}
