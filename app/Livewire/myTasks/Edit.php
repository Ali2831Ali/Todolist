<?php

namespace App\Livewire\myTasks;

use App\Models\Task;
use Livewire\Component;

class Edit extends Component
{
    public int $taskId;

    public string $title='';
    public string $description='';


    public function mount($taskId,$name,$description)
    {
        $this->taskId = $taskId;
        $this->title = $name;
        $this->description = $description;
    }
    public function saveChanges()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:255|min:3',
        ]);
        $task = Task::findOrFail($this->taskId);
        try {
            $task->update($validatedData);
            session()->flash('message', 'Task updated successfully');
        }catch (\Exception $e){
            session()->flash('errorMessage',$e->getMessage());
        }

        $this->dispatch('CloseEdit');

    }
    public function CloseEdit()
    {
        $this->dispatch('CloseEdit');
    }
    public function render()
    {
        return view('livewire.myTasks.edit');
    }
}
