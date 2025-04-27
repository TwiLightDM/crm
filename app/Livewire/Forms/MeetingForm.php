<?php

namespace App\Livewire\Forms;

use App\Models\Lead;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MeetingForm extends Form
{
    public $lead_id;
    public $lead_status;
    public $user_id;

    #[Validate('required', message: 'Укажите дату встречи')]
    public $date;

    public $switch = false;


    #[Validate('required', message: 'Установите результат встречи')]
    public $status;

    public function setForm($meeting){
        $this->lead_id = $meeting->lead_id;
        $this->lead_status = Lead::find($meeting->lead_id)->status;
        $this->user_id = $meeting->user_id;
        $this->date = $meeting->date;
        $this->status = $meeting->status;
    }

    public function setDefaultForm($lead_id, $user_id) {
        $this->lead_id = $lead_id;
        $this->lead_status = Lead::find($lead_id)->status;
        $this->user_id = $user_id;
        $this->status = 'Назначена';
        $this->switch = false;
    }
}
