<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abaout Us</title>
    <link rel="stylesheet" href="css/Styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <section id="header">
        @include('livewire.layouts.nav2')
    </section>

    <section class="about m-3" id="about" style="min-height: 100vh">
        <div>
            <center class="mb-4">
                <h2 class="title fw-bold">About Us</h2>
                <div class="text" style="font-size: 0.8rem">Created with love and passion for French patisserie, The Harvest is today's
                    largest European-style bakery & pastry shop chain in Indonesia <span class="typing-2"></span>
                </div>
            </center>
            <div class="container">
                <div class="about-content d-flex">
                    <div class="w-50">
                        <img width="100%" height="400px" src="https://harvestcakes.com/static/img/Top%20section_1161x463px.jpg" alt="">
                    </div>
                    <div  class="w-50 m-3">
                        <p>An enthusiastic and passionate student exploring the world of technology, I have a deep interest
                            in understanding the latest
                            technological developments. With my current major in Information Systems and organizational
                            experience from high school
                            to the present, I am ready to utilize my technical skills and am always open to learning and
                            keeping up with the latest
                            developments in the industry.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <footer>
            <span>Created By Ovenomics</a> | <span class="far fa-copyright"></span> 2024 All rights reserved.</span>
        </footer>
    </body>

    </html>
