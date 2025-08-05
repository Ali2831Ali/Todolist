<?php

namespace App\Livewire\myTasks;

use Livewire\Component;

class Edit extends Component
{
    public function CloseEdit()
    {
        $this->dispatch('CloseEdit');
    }
    public function render()
    {
        return view('livewire.myTasks.edit');
    }
}
