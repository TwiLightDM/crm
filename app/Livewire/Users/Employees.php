<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\SearchForm;
use App\Livewire\Forms\SortForm;
use App\Models\Meeting;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Employees extends Component
{
    public $del_id = 0;
    public $isClosedEditor;
    public $users;
    public SortForm $sort;

    public SearchForm $form;

    public function mount(){
        $this->form->setDefault('id');
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
        $this->dispatch('edit-user', id: $id);
    }
    public function read($id){
        $this->isClosedEditor = false;
        $this->dispatch('read-user', id: $id);
    }

    public function block($id){
        User::find($id)->update(['blocked' => true]);
    }

    public function unblock($id){
        User::find($id)->update(['blocked' => false]);
    }

    public function createUser(){
        $this->isClosedEditor = false;
        $this->dispatch('create-user');
    }

    public function try2Delete($id){
        $this->del_id = $id;
    }

    public function discardDelete(){
        $this->del_id = 0;
    }

    public function acceptDelete(){
        $meetings = Meeting::where('user_id', $this->del_id)->get();
        $tasks = Meeting::where('user_id', $this->del_id)->get();

        foreach ($meetings as $meeting) $meeting->update(['user_id' => User::admin()->id]);
        foreach ($tasks as $task) $task->update(['user_id' => User::admin()->id]);

        User::find($this->del_id)->delete();
        $this->discardDelete();
    }

    #[On('user-reader-closed')]
    #[On('user-editor-closed')]
    #[On('user-creator-closed')]
    public function closeEditor(){
        $this->isClosedEditor = true;
    }
    public function render()
    {
        $sort_field = $this->sort->field;
        $dir = $this->sort->dir;
        $field = $this->form->field;
        $text = $this->form->text;

        $this->users = User::where($field, 'LIKE', '%'.$text.'%')
        ->orderBy($sort_field, $dir)
        ->get();

        return view('livewire.users.employees');
    }
}
