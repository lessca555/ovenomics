<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>

    {{-- css link --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ url('css/Styles.css') }}">

    <script src="https://kit.fontawesome.com/d508f9c7b5.js" crossorigin="anonymous"></script>

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
            <h1 class="mt-3">Create an ingredient</h1>
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
        <form method="post" action="{{route('ingredient.store')}}" class="mt-3">
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
                <label for="type_of_unit">Type of unit</label>
                <select name="type_of_unit" class="form-select form-select-lg">
                    <option value="volume">Volume</option>
                    <option value="weight">Weight</option>
                    <option value="quantity">Quantity</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" placeholder="quantity" class="form-control">
            </div>
            <div class="mb-3">
                <label for="unit_case">Unit case</label>
                <input type="text" name="unit_case" placeholder="unit case" class="form-control">
            </div>
            <div class="mb-3">
                <label for="cost">Cost</label>
                <input type="text" name="cost" placeholder="cost" class="form-control">
            </div>
            <div class="mb-3">
                {{-- <button onclick="window.location='{{ route('ingredient.index') }}'" class="btn btn-outline-primary">Back</button> --}}
                <input type="submit" value="Save a new ingredient" class="btn btn-primary" />
            </div>
        </form>
    </div>

    <footer>
        <span>Created By Ovenomics</a> | <span class="far fa-copyright"></span> 2024 All rights reserved.</span>
    </footer>
</body>
</html>
