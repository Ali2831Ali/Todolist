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

    protected $listeners = ['CloseEdit','CloseCreate','CloseDelete'];
    public function ShowCreate()
    {
        $this->showCreate = true;
    }
    public function CloseCreate()
    {
        $this->showCreate = false;
    }

    public function ShowEdit()
    {
        $this->showEdit = true;
    }
    public function CloseEdit()
    {
        $this->showEdit = false;
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
