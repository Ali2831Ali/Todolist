<?php

namespace App\Livewire\myCats;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public bool $showCreate  = false;
    public bool $showEdit  = false;
    public bool $showDelete  = false;
    public array $Cats= [];
    public ?int $editCatId = null;
    public ?int $DeleteCatId = null;
    public string|null $editCatName = '';
    public string $editCatDesc = '';
    protected $listeners = ['CloseEdit','CloseCreate','CloseDelete'];
    public function ShowCreate()
    {
        $this->showCreate = true;
    }
    public function CloseCreate()
    {
        $this->showCreate = false;
        $this->Cats = Category::all()->toArray();
    }

    public function ShowEditCat($id,$name,$description)
    {
        $this->editCatId = $id;
        $this->editCatName = $name;
        $this->editCatDesc = $description;
        $this->showEdit = true;
    }
    public function CloseEdit()
    {
        $this->showEdit = false;
        $this->Cats = Category::all()->toArray();
    }

    public function ShowDelete($id)
    {
        $this->DeleteCatId = $id;
        $this->showDelete = true;
    }
    public function CloseDelete()
    {
        $this->showDelete = false;
        $this->Cats = Category::all()->toArray();
    }

    public function mount()
    {
        $this->Cats = Category::all()->toArray();
    }

    public function render()
    {
        return view('livewire.myCats.index');
    }
}
