<?php

namespace App\Livewire\myTasks;

use Livewire\Component;

class Create extends Component
{
    public function CloseCreate()
    {
        $this->dispatch('CloseCreate');
    }
    public function render()
    {
        return view('livewire.myTasks.create');
    }
}
