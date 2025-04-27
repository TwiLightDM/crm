<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LeadForm extends Form
{
    #[Validate('required', message: 'Имя не может быть пустым')]
    #[Validate('max:80', message: 'Имя должно составлять не более 80 символов')]
    public $name;

    #[Validate('required', message: 'Поле фамилия не может быть пустым')]
    #[Validate('max:80', message: 'Фамилия должна составлять не более 80 символов')]
    public $surname;

    #[Validate('max:80', message: 'Отчество должно составлять не более 80 символов')]
    public $patronymic;

    #[Validate('required', message: 'Телефон не может быть пустым')]
    #[Validate('regex:/^((\+7|8)+([0-9]){10})$/', message: 'Телефон должен соответсвовать формату \'(8/+7)xxxxxxxxxx)\'')]
    public $phone;

    public $status;

    public function setForm($Lead){
        $this->name = $Lead->name;
        $this->surname = $Lead->surname;
        $this->patronymic = $Lead->patronymic;
        $this->phone = $Lead->phone;
        $this->status = $Lead->status;
    }

    public function setDefaultForm(){
        $this->status = 'Новый';
    }
}
