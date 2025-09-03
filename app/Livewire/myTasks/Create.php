<?php

namespace App\Livewire\myTasks;

use App\Models\Task;
use Livewire\Component;

class Create extends Component
{
    public string $name;
    public string $description;
    public function saveChanges()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:255|min:3',
        ]);
        Task::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->CloseCreate();

    }
    public function CloseCreate()
    {
        $this->dispatch('CloseCreate');
    }
    public function render()
    {
        return view('livewire.myTasks.create');
    }
}
