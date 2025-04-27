<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('required', message: 'Имя не может быть пустым')]
    #[Validate('max:80', message: 'Имя должно составлять не более 80 символов')]
    public $name;

    #[Validate('required', message: 'Поле фамилия не может быть пустым')]
    #[Validate('max:80', message: 'Фамилия должна составлять не более 80 символов')]
    public $surname;

    #[Validate('max:80', message: 'Отчество должно составлять не более 80 символов')]
    public $patronymic;

    #[Validate('required', message: 'email не может быть пустым')]
    #[Validate('regex:/^\S+@\S+\.\S+$/', message: 'email должен соответсвовать формату \'x@x.x\'')]
    #[Validate('unique:users', message:'Пользователь с таким email уже сущесвтует')]
    public $email;

    #[Validate('numeric')]
    #[Validate('min:1', message: 'Выберите отдел')]
    public $department_id = 0;

    #[Validate('required', message: 'Поле пароль не может быть пустым')] 
    #[Validate('min:8', message: 'Пароль не может быть меньше 8 символов')] 
    public $password;

    #[Validate('required', message: 'Поле подтвердите пароль не может быть пустым')] 
    #[Validate('same:password', message:'Пароли не сопадают')]
    public $password_confirmation;

    #[Validate('numeric')]
    #[Validate('min:1', message: 'Выберите роль')]
    public $role_id = 0;

    public $blocked = false;
}
