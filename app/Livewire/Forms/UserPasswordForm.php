<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserPasswordForm extends Form
{
    #[Validate('required', message: 'Поле пароль не может быть пустым')] 
    #[Validate('min:8', message: 'Пароль не может быть меньше 8 символов')] 
    public $password;

    #[Validate('required', message: 'Поле подтвердите пароль не может быть пустым')] 
    #[Validate('same:password', message:'Пароли не сопадают')]
    public $password_confirmation;
}
