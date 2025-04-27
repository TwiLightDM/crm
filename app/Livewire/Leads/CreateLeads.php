<?php

namespace App\Livewire\Leads;

use App\Livewire\Forms\LeadForm;
use App\Models\Lead;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateLeads extends Component
{
    public $tryCreate;
    public LeadForm $form;
    public $id;


    #[On('create-lead')]
    public function launchCreator(){
        $this->form->setDefaultForm();
        $this->tryCreate = true;
    }

    public function create(){
        $this->form->validate();
        Lead::create($this->form->all());
        $this->closeEditor();
    }

    public function closeEditor(){
        $this->id = null;
        $this->tryCreate = false;
        $this->form->reset();
        $this->dispatch('lead-creator-closed');
    }

    public function render()
    {
        return view('livewire.leads.create-leads');
    }
}
