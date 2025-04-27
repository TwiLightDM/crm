<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserEditForm extends Form
{
    #[Validate('required', message: 'Имя не может быть пустым')]
    #[Validate('max:80', message: 'Имя должно составлять не более 80 символов')]
    public $name;

    #[Validate('required', message: 'Поле фамилия не может быть пустым')]
    #[Validate('max:80', message: 'Фамилия должна составлять не более 80 символов')]
    public $surname;

    #[Validate('max:80', message: 'Отчество должно составлять не более 80 символов')]
    public $patronymic;

    #[Validate('numeric')]
    #[Validate('min:1', message: 'Выберите отдел')]
    public $department_id = 0;

    public $status;
    public function setForm($user){
        $this->name = $user->name;
        $this->surname = $user->surname;
        $this->patronymic = $user->patronymic;
        $this->department_id = $user->department_id;
        $this->status = $user->status;
    }
}
