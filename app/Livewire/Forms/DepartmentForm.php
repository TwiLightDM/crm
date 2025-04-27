<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DepartmentForm extends Form
{
    #[Validate('required', message: 'Имя не может быть пустым')]
    #[Validate('max:80', message: 'Имя должно составлять не более 80 символов')]
    public $name;

    public function setData($user){
        $this->name = $user->name;
    }
}
