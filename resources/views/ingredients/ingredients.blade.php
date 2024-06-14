<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingredients</title>

    {{-- css link --}}

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="css/Styles.css">

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

    <div class="d-flex">
        <aside>
            @include('ingredients.layouts.sidebar')
        </aside>
        <main class="m-3">
            <section id="title" class="container">
                <nav aria-label="breadcrumb mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ingredients</li>
                    </ol>
                </nav>
                <div class="title">
                    <i class="fa-solid fa-carrot" style="font-size: 3rem"></i>
                    <div>
                        <h1>Ingredients</h1>
                        <span>Food, packaging ...</span>
                    </div>
                </div>
                <div>
                    @if(session()->has('success'))
                    <div>
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
                <div>
                    @livewire('ingredient-table')
                    {{-- <div>
                        <a href="{{ route ('ingredient.create') }}" class="btn btn-primary"> Tambahkan Ingredient</a>
                    </div> --}}
                </div>
            </section>
        </main>
    </div>

    <footer>
        <span>Created By Ovenomics</a> | <span class="far fa-copyright"></span> 2024 All rights reserved.</span>
    </footer>
</body>
</html>
