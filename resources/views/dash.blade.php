<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    {{-- css link --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="css/Styles.css">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <section id="header">
        @include('livewire.layouts.nav2');
    </section>

    <div style="min-height: 100vh">
        <section id="title" class="container -ml-3 -mr-3">
            <h1>Dashboard</h1>
        </section>

        <section id="container" class="box-cont">
            <div class="box-cont1">
                <div class="box-cont2">
                    <div class="box" id="box1">
                        <a href="/recipe">
                            <h3>Recipes</h3>
                        </a>
                    </div>
                    <div class="box" id="box2">
                        <a href="/ingredient">
                            <h3>Ingredients</h3>
                        </a>
                    </div>
                </div>
                <div class="box" id="box3">
                    <a href="/profitability">
                        <h3>Profitability</h3>
                    </a>
                </div>
            </div>
        </section>

    </div>

    <footer>
        <span>Created By Ovenomics</a> | <span class="far fa-copyright"></span> 2024 All rights reserved.</span>
    </footer>
</body>
</html>
