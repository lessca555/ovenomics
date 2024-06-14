<?php

namespace App\Livewire;

use App\Models\Ingredient;
use App\Models\IgCategory;
use Livewire\Component;
use Livewire\WithPagination;

class IngredientTable extends Component
{
    public $searchTerm = '';
    public $sortDirection = 'asc'; // Default sort direction
    public $sortField = 'id'; // Default sort field
    public $selectedCategory = 'all'; // Default category filter

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $updatesQueryString = ['searchTerm'];

    public function updatedSearchTerm()
    {
        // Reset pagination to the first page whenever the search term changes
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function categories()
    {
        return IgCategory::all();
    }

    public function filterByCategory($category)
    {
        $this->selectedCategory = $category;
        $this->resetPage(); // Reset pagination when category changes
    }

    public function showAllIngredients()
    {
        $this->selectedCategory = 'all';
        $this->resetPage(); // Reset pagination to the first page
    }

    public function render()
    {
        $query = Ingredient::query();
        
        if ($this->searchTerm) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
        }

        if ($this->selectedCategory !== 'all') {
            $query->where('category_id', $this->selectedCategory);
        }

        $ingredients = $query->orderBy($this->sortField, $this->sortDirection)->paginate(5);

        return view('livewire.ingredient-table', [
            'ingredients' => $ingredients,
            'categories' => $this->categories(),
        ]);
    }
}
