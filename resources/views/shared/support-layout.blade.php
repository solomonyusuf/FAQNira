<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="img/nira_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nira FAQ | Knowledge Base Document</title>
    <meta name="description" content="Knowledge Base TailwindCSS HTML Template">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .accordion-button:not(.collapsed) {
            color: black;
            background-color: #f8f9fa;
        }
        body {
            font-family: 'Wix Madefor Display', sans-serif;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 1rem 0;
            text-align: center;
            font-size: 0.9rem;
        }
        .footer p {
            margin: 0;
            color: #6c757d;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
<header class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="img/nira_logo.png" alt="NIRA Logo" style="height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('support') }}">Support</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Docs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</header>

<div class="container mt-5">
    <div class="row">

         @yield('body')
          
    </div>
</div>

<!-- Footer -->
<footer class="footer mt-5">
    <div class="container">
        <p>&copy; 2020 NiRA. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
