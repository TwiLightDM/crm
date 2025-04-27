<?php

namespace App\Livewire\Projects;

use App\Livewire\Forms\SearchForm;
use App\Livewire\Forms\SortForm;
use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class Projects extends Component
{
    public $del_id = 0;
    public $isClosedEditor;
    public $projects;
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
        $this->dispatch('edit-project', id: $id);
    }

    public function read($id){
        $this->isClosedEditor = false;
        $this->dispatch('read-project', id: $id);
    }

    public function try2Delete($id){
        $this->del_id = $id;
    }

    public function discardDelete(){
        $this->del_id = 0;
    }

    public function acceptDelete(){
        Project::find($this->del_id)->delete();
        $this->discardDelete();
    }

    #[On('project-reader-closed')]
    #[On('project-editor-closed')]
    public function closeEditor(){
        $this->isClosedEditor = true;
    }
    public function render()
    {
        $field = $this->form->field;
        $text = $this->form->text;
        $sort_field = $this->sort->field;
        $dir = $this->sort->dir;

        $this->projects = Project::where($field, 'LIKE', '%'.$text.'%')->orderBy($sort_field, $dir)->get();
        return view('livewire.projects.projects');
    }
}
