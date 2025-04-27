<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\SearchForm;
use App\Livewire\Forms\SortForm;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class Tasks extends Component
{
    public $del_id = 0;
    public $finishError = false;
    public $isClosedEditor;

    public $tasks;
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

    public function accept($id){
        Task::find($id)->update(['status' => 'В работе', 'user_id' => auth()->id()]);
    }

    public function finish($id){
        $task = Task::find($id);

        if (auth()->id() != $task->user_id) $this->finishError = true;
        else $task->update(['status' => 'Выполнена']);
    }

    public function read($id){
        $this->isClosedEditor = false;
        $this->dispatch('read-task', id: $id);
    }

    public function edit($id){
        $this->isClosedEditor = false;
        $this->dispatch('edit-task', id: $id);
    }

    public function try2Delete($id){
        $this->del_id = $id;
    }

    public function discardDelete(){
        $this->del_id = 0;
    }

    public function discardError(){
        $this->finishError = false;
    }

    public function acceptDelete(){
        Task::find($this->del_id)->delete();
        $this->discardDelete();
    }

    #[On('task-reader-closed')]
    #[On('task-editor-closed')]
    public function closeEditor(){
        $this->isClosedEditor = true;
    }

    public function render()
    {
        $field = $this->form->field;
        $text = $this->form->text;
        $sort_field = $this->sort->field;
        $dir = $this->sort->dir;

        $this->tasks = Task::where($field, 'LIKE', '%'.$text.'%')->orderBy($sort_field, $dir)->get();
        return view('livewire.tasks.tasks');
    }
}
