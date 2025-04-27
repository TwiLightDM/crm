<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SearchForm extends Form
{
    public $field = 'id';
    public $text = '';

    public function setDefault($field){
        $this->field = $field;
    }
}
