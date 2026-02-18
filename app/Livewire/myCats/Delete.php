<?php

namespace App\Livewire\myCats;

use App\Models\Cat;
use App\Models\Category;
use Livewire\Component;

class Delete extends Component
{
    public $CatId = null;
    public function mount($deleteId)
    {
        $this->CatId = $deleteId;
    }
    public function ConfirmDelete()
    {
        $Cat = Category::findOrFail($this->CatId);
        $Cat->delete();
        $this->closeDelete();
    }
    public function CloseDelete()
    {
        $this->dispatch('CloseDelete');
    }

    public function render()
    {
        return view('livewire.myCats.delete');
    }
}
