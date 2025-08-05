<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    private $view = 'dashboard';

    public function setview($view)
    {
        $this->view = $view;
    }
    public function render()
    {
        return view('livewire.sidebar.index');
    }
}
