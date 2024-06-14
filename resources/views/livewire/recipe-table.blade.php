<div>
    <div class="d-flex mt-4 mb-4" id="searchcat">
        <div class="w-50 align-content-center">
            <label for="">Search (one or multiple words)</label>
            <input type="text" class="form-control" placeholder="Cari Resep" wire:model.live="searchTerm" />
        </div>

        {{-- <div class="flex-column">
            @livewire('create-category')
            <div class="align-content-center mt-3">
                <p>Category: </p>
                <button class="btn btn-primary" wire:click="showAllRecipes">All</button>
                @foreach($categories as $category)
                <button class="btn btn-secondary" wire:click="filterByCategory('{{ $category->id }}')">{{ $category->name }}</button>
                @endforeach
            </div>
        </div> --}}
    </div>


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" wire:click="sortBy('id')" style="cursor:pointer;">
                    @if($sortField === 'id')
                    @if($sortDirection === 'asc')
                    &uarr;
                    @else
                    &darr;
                    @endif
                    @endif
                </th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Yield</th>
                <th scope="col">Selling Price</th>
                <th scope="col">Cost Price</th>
                <th scope="col">Gross Margin</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
            <tr>
                <td>{{ $recipe->id }}</td>
                <td>{{ $recipe->name }}</td>
                <td>{{ $recipe->description }}</td>
                <td>{{ $recipe->category->name }}</td>
                <td>{{ $recipe->yield }}</td>
                <td>{{ $recipe->selling_price }}</td>
                <td>{{ $recipe->cost_price }}</td>
                <td>{{ $recipe->gross_margin }}</td>
                <td>
                    <a href="{{ route('recipe.edit', ['recipe' => $recipe]) }}" class="btn btn-outline-primary">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{ route('recipe.hapus', ['recipe' => $recipe]) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger" />
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $recipes->links() }} <!-- Pagination links -->
    </div>
</div>
