<form wire:submit.prevent="createCategory">
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" class="form-control" id="name" wire:model.defer="name" placeholder="Enter category name">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create Category</button>
</form>
