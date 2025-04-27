<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SortForm extends Form
{
    public $field = 'id';
    public $dir = 'desc';

    public function setDefault(){
        $this->field = 'id';
        $this->dir = 'desc';
    }
}
