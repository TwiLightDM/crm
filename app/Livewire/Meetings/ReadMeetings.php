<?php

namespace App\Livewire\Meetings;

use App\Models\Meeting;
use Livewire\Attributes\On;
use Livewire\Component;

class ReadMeetings extends Component
{
    public $meeting;

    #[On('read-meeting')]
    public function launchCreator($id){
        $this->meeting = Meeting::find($id);
    }

    public function close(){
        $this->meeting = null;
        $this->dispatch('meeting-reader-closed');
    }
    public function render()
    {
        return view('livewire.meetings.read-meetings');
    }
}
