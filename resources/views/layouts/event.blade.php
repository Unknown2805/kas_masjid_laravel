<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="assets/css/shared/iconly.css">

    <style>
        body {
            background-color: white;
        }

        .carousel {
            margin-left: 1%;
            margin-right: 1%;
            margin-bottom: 5%;
        }
    </style>

</head>


<body>

    <nav class="navbar navbar-expand" style="z-index: 10000">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" style="color: #000000;font-size:18px;" aria-current="page"
                            href="{{ url('/login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    {{-- carousel --}}

    <div class="carousel" style="top: 0">
        <div class="col-sm-9">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/samples/building.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/samples/architecture1.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="assets/js/app.js"></script>

    <script src="assets/js/pages/dashboard.js"></script>

</body>

</html>
