<?php

namespace App\Livewire\myCats;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public int $CatId;
    public string $name='';
    public string $description='';


    public function mount($CatId,$name,$description)
    {
        $this->CatId = $CatId;
        $this->name = $name;
        $this->description = $description;
    }
    public function saveChanges()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:255|min:3',
        ]);
        $Cat = Category::findOrFail($this->CatId);
        try {
            $Cat->update($validatedData);
            session()->flash('message', 'Cat updated successfully');
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
        return view('livewire.myCats.edit');
    }
}
