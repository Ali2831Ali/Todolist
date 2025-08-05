<?php

namespace App\Livewire\myTasks;

use Livewire\Component;

class Delete extends Component
{
    public function CloseDelete()
    {
        $this->dispatch('CloseDelete');
    }

    public function render()
    {
        return view('livewire.myTasks.delete');
    }
}
