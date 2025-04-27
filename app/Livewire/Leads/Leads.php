<?php

namespace App\Livewire\Leads;

use App\Livewire\Forms\SearchForm;
use App\Livewire\Forms\SortForm;
use App\Models\Lead;
use App\Models\Meeting;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class Leads extends Component
{
    public $del_id = 0;
    public $isClosedEditor;
    public $leads;
    public SearchForm $form;
    public SortForm $sort;

    public function mount(){
        $this->isClosedEditor = true;
    }

    public function resetSearch(){
        $this->form->text = '';
        $this->form->field = 'id';
    }

    public function resetSort(){
        $this->sort->dir = 'desc';
        $this->sort->field = 'id';
    }

    public function editLead($id){
        $this->isClosedEditor = false;
        $this->dispatch('edit-lead', id: $id);
    }

    public function readLead($id){
        $this->isClosedEditor = false;
        $this->dispatch('read-lead', id: $id);
    }

    public function createLead(){
        $this->isClosedEditor = false;
        $this->dispatch('create-lead');
    }

    public function try2Delete($id){
        $this->del_id = $id;
    }

    public function discardDelete(){
        $this->del_id = 0;
    }

    public function acceptDelete(){
        Lead::find($this->del_id)->delete();
        $this->discardDelete();
    }

    #[On('lead-creator-closed')]
    #[On('lead-editor-closed')]
    #[On('lead-reader-closed')]
    public function closeEditor(){
        $this->isClosedEditor = true;
    }

    public function render()
    {
        $field = $this->form->field;
        $text = $this->form->text;
        $sort_field = $this->sort->field;
        $dir = $this->sort->dir;

        $this->leads = Lead::where($field, 'LIKE', '%'.$text.'%')->orderBy($sort_field, $dir)->get();

        return view('livewire.leads.leads');
    }
}
