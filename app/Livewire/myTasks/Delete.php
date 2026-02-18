<?php

namespace App\Livewire\myTasks;

use App\Models\Task;
use Livewire\Component;

class Delete extends Component
{
    public $taskId = null;
    public function mount($deleteId)
    {
        $this->taskId = $deleteId;
    }
    public function ConfirmDelete()
    {
        $task = Task::findOrFail($this->taskId);
        $task->delete();
        $this->closeDelete();
    }
    public function CloseDelete()
    {
        $this->dispatch('CloseDelete');
    }

    public function render()
    {
        return view('livewire.myTasks.delete');
    }
}
