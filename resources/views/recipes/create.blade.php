<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>

    {{-- css link --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ url('css/Styles.css') }}">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>

<body>
    <section id="header">
        @include('livewire.layouts.nav2')
    </section>

    <div class="container -ml-3 -mr-3">
        <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-plus" style="font-size: 45px;"></i>
            <h1 class="mt-3">Create a recipe</h1>
        </div>
        <div>
            @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>

            @endif
        </div>
        <form method="post" action="{{route('recipe.store')}}" class="mt-3">
            @csrf
            @method('post')
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <input type="text" name="description" placeholder="description" class="form-control">
            </div>
            <div class="mb-3">
                <label for="category">Category</label>
                <select name="category_id" class="form-select form-select-lg"> <!-- Ensure this is category_id -->
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="yield">Yield</label>
                <input type="text" name="yield" placeholder="yield" class="form-control">
            </div>
            <div class="mb-3">
                <label for="selling_price">Selling Price</label>
                <input type="text" id="selling_price" name="selling_price" placeholder="selling_price" class="form-control">
            </div>
            <div class="mb-3">
                <label for="cost_price">Cost Price</label>
                <input type="text" id="cost_price" name="cost_price" placeholder="cost_price" class="form-control">
            </div>
            <div class="mb-3">
                <button onclick="window.location='{{ route('recipe.index') }}'" class="btn btn-outline-primary">Back</button>
                <input type="submit" value="Save a new recipe" class="btn btn-primary" />
            </div>
        </form>
    </div>
</body>
</html>
