<?php

namespace App\Livewire\Meetings;

use App\Livewire\Forms\SearchForm;
use App\Livewire\Forms\SortForm;
use App\Models\Meeting;
use Livewire\Attributes\On;
use Livewire\Component;

class Meetings extends Component
{
    public $del_id = 0;
    public $isClosedEditor;
    public $meetings;
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
    public function edit($id){
        $this->isClosedEditor = false;
        $this->dispatch('edit-meeting', id: $id);
    }

    public function read($id){
        $this->isClosedEditor = false;
        $this->dispatch('read-meeting', id: $id);
    }

    public function try2Delete($id){
        $this->del_id = $id;
    }

    public function discardDelete(){
        $this->del_id = 0;
    }

    public function acceptDelete(){
        Meeting::find($this->del_id)->delete();
        $this->discardDelete();
    }

    #[On('meeting-reader-closed')]
    #[On('meeting-editor-closed')]
    public function closeEditor(){
        $this->isClosedEditor = true;
    }
    public function render()
    {
        $field = $this->form->field;
        $text = $this->form->text;
        $sort_field = $this->sort->field;
        $dir = $this->sort->dir;

        $this->meetings = Meeting::where($field, 'LIKE', '%'.$text.'%')->orderBy($sort_field, $dir)->get();
        return view('livewire.meetings.meetings');
    }
}
