<?php

namespace App\Livewire;

use App\Models\Recipe;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class RecipeTable extends Component
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
        return Category::all();
    }

    public function filterByCategory($category)
    {
        $this->selectedCategory = $category;
        $this->resetPage(); // Reset pagination when category changes
    }

    public function showAllRecipes()
    {
        $this->selectedCategory = 'all';
        $this->resetPage(); // Reset pagination to the first page
    }

    public function createCategory()
    {
        // Create a new category in the database
        Category::create([
            'name' => 'New Category', // You can set a default name here or prompt the user for input
            // Add other fields as needed
        ]);
    }

    

    public function render()
    {
        $query = Recipe::query();
        
        if ($this->searchTerm) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
        }

        if ($this->selectedCategory !== 'all') {
            $query->where('category_id', $this->selectedCategory);
        }

        $recipes = $query->orderBy($this->sortField, $this->sortDirection)->paginate(5);

        return view('livewire.recipe-table', [
            'recipes' => $recipes,
            'categories' => $this->categories(),
        ]);
    }
}
