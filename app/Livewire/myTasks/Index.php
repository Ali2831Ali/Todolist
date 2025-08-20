<?php

namespace App\Livewire\myTasks;

use App\Models\Task;
use Livewire\Component;

class Index extends Component
{
    public bool $showCreate  = false;
    public bool $showEdit  = false;
    public bool $showDelete  = false;

    public array $Tasks= [];
    public ?int $editTaskId = null;
    public string|null $editTaskName = '';
    public string $editTaskDesc = '';
    protected $listeners = ['CloseEdit','CloseCreate','CloseDelete'];
    public function ShowCreate()
    {
        $this->showCreate = true;
    }
    public function CloseCreate()
    {
        $this->showCreate = false;
    }

    public function ShowEdit($id,$name,$description)
    {
        $this->editTaskId = $id;
        $this->editTaskName = $name;
        $this->editTaskDesc = $description;
        $this->showEdit = true;
    }
    public function CloseEdit()
    {
        $this->showEdit = false;
        $this->Tasks = Task::all()->toArray();
    }

    public function ShowDelete()
    {
        $this->showDelete = true;
    }
    public function CloseDelete()
    {
        $this->showDelete = false;
    }

    public function mount()
    {
        $this->Tasks = Task::all()->toArray();
    }

    public function render()
    {
        return view('livewire.myTasks.index');
    }
}
