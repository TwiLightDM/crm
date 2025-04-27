<?php

namespace App\Livewire\Meetings;

use App\Livewire\Forms\MeetingForm;
use App\Livewire\Forms\ProjectForm;
use App\Models\Lead;
use App\Models\Meeting;
use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class EditMeetings extends Component
{
    public $tryEdit;
    public MeetingForm $form;
    public ProjectForm $formProject;
    public $id;


    #[On('edit-meeting')]
    public function launchEditor($id){
        $this->id = $id;
        $meeting = Meeting::find($id);
        $this->form->setForm($meeting);
        $this->formProject->setDefaultForm($meeting->lead_id);
        $this->tryEdit = true;
    }

    public function edit(){
        $this->form->validate();

        $meet = Meeting::find($this->id);
        $meet->update($this->form->all());

        session()->flash('edit-info');
    }

    public function createProject(){
        $this->formProject->validate();

        if ($this->formProject->switch) {
            Lead::find($this->formProject->lead_id)->update(['status' => 'Ожидает выполнения']);
            $this->formProject->switch = false;
        }
        
        Project::create($this->formProject->all());
        $this->closeEditor();
    }

    public function closeEditor(){
        $this->id = null;
        $this->tryEdit = false;
        $this->form->reset();
        $this->formProject->reset();
        $this->dispatch('meeting-editor-closed');
    }

    public function render()
    {
        return view('livewire.meetings.edit-meetings');
    }
}
