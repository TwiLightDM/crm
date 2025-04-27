<?php

namespace App\Livewire\Leads;

use App\Models\Lead;
use Livewire\Attributes\On;
use Livewire\Component;

class ReadLeads extends Component
{
    public $lead;

    #[On('read-lead')]
    public function launchCreator($id){
        $this->lead = Lead::find($id);
    }

    public function close(){
        $this->lead = null;
        $this->dispatch('lead-reader-closed');
    }
    public function render()
    {
        return view('livewire.leads.read-leads');
    }
}
