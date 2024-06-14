<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CreateCategory extends Component
{
    public $name;

    public function createCategory()
    {
        // Validate input
        $this->validate([
            'name' => 'required|unique:categories',
        ]);

        // Create a new category in the database
        Category::create([
            'name' => $this->name,
        ]);

        // Reset form fields
        $this->reset();

        // Optionally, emit an event or redirect to another page
    }
    
    public function render()
    {
        return view('livewire.create-category');
    }
}
