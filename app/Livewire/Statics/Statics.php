<?php

namespace App\Livewire\Statics;

use Livewire\Component;
use App\Models\Lead;
use Carbon\Carbon;

class Statics extends Component
{
    public $todayLeads;
    public $lead = null;

    public function mount()
    {
        $this->todayLeads = Lead::orderBy('created_at', 'desc')->take(5)->get();
    }

    public function launchCreator($id)
    {
        $this->lead = Lead::find($id);
    }

    public function close()
    {
        $this->lead = null;
        $this->dispatch('lead-reader-closed');
    }

    public function render()
    {
        return view('livewire.statics.statics', [
            'lead' => $this->lead,
            'todayLeads' => $this->todayLeads,
        ]);
    }
}
