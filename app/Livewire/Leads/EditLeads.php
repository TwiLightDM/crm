<?php

namespace App\Livewire\Leads;

use App\Livewire\Forms\LeadForm;
use App\Livewire\Forms\MeetingForm;
use App\Models\Lead;
use App\Models\Meeting;
use Livewire\Attributes\On;
use Livewire\Component;

class EditLeads extends Component
{
    public $tryEdit;
    public LeadForm $form;
    public MeetingForm $formMeeting;
    public $id;


    #[On('edit-lead')]
    public function launchEditor($id){
        $this->id = $id;
        $this->form->setForm(Lead::find($id));
        $this->formMeeting->setDefaultForm($id, auth()->id());
        $this->tryEdit = true;
    }

    public function edit(){
        $this->form->validate();

        $lead = Lead::find($this->id);
        $lead->update($this->form->all());

        session()->flash('edit-info');
    }

    public function createMeeting(){
        $this->formMeeting->validate();

        if ($this->formMeeting->switch) {
            Lead::find($this->id)->update(['status' => 'Назначена встреча']);
            $this->formMeeting->switch = false;
        }

        Meeting::create($this->formMeeting->all());

        $this->closeEditor();
    }

    public function closeEditor(){
        $this->id = null;
        $this->tryEdit = false;
        $this->form->reset();
        $this->formMeeting->reset();
        $this->dispatch('lead-editor-closed');
    }

    public function render()
    {
        return view('livewire.leads.edit-leads');
    }
}
