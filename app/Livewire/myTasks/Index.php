<?php

namespace App\Livewire\myTasks;

use App\Models\Task;
use Livewire\Component;

class Index extends Component
{
    public $showCreate  = false;
    public $showEdit  = false;
    public $showDelete  = false;

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



    public array $Tasks= [];
    public function index()
    {
        $this->Tasks = Task::query()->get()->toArray();
    }

    public function render()
    {
        return view('livewire.myTasks.index');
    }
}
