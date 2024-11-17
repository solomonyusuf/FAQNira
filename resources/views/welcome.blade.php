<?php
$models = \App\Models\Article::where(['published' => true])->limit(4)->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Platform - NiRA Knowledge Base</title>
    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="icon" type="image/x-icon" href="nira_logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@600;700&display=swap">
    <style>
        body {
            font-family: 'Wix Madefor Display', sans-serif;
        }
        .hero {
            background: url('img/8970.jpg') no-repeat center center;
            background-size: cover;
            color: #fff;
            padding: 120px 0;
            text-align: center;
        }
        .search-bar {
            max-width: 600px;
            margin: 0 auto;
        }
        .feature-icon {
            font-size: 48px;
            color: #26b874;
            transition: transform 0.3s;
        }
        .feature-icon:hover {
            transform: scale(1.1);
        }
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-link{
            color:#198754;
        }
        .fade-in {
            opacity: 0;
            animation: fadeIn 0.8s forwards;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/nira_logo.png" alt="Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ml-5"><a class="nav-link" href="{{ route('support') }}">Support</a></li>
                    <li class="nav-item ml-5"><a class="nav-link" href="{{ route('docs') }}">Docs</a></li>
                    <li class="nav-item ml-5"><a class="nav-link" href="{{ route('login') }}">Sign In</a></li>
                    <li class="nav-item ml-5"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="display-4">Welcome to NiRA FAQ Platform</h1>
            <p class="lead">Get answers to common questions and explore our knowledge base.</p>
            <div class="search-bar my-4">
                <form method="get" action="{{ route('search_all') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search FAQs..." aria-label="Search FAQs">
                        <button class="btn btn-success" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4">
                    <div class="feature-icon mb-3">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <h5>Comprehensive Search</h5>
                    <p>Find answers quickly with our powerful search functionality.</p>
                </div>
                <div class="col-lg-4">
                    <div class="feature-icon mb-3">
                        <i class="fa-brands fa-rocketchat"></i>
                    </div>
                    <h5>Instant Assistance</h5>
                    <p>Access instant answers to frequently asked questions.</p>
                </div>
                <div class="col-lg-4">
                    <div class="feature-icon mb-3">
                        <i class="fa-solid fa-shield"></i>
                    </div>
                    <h5>Reliable Information</h5>
                    <p>Get trusted and accurate information verified by experts.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular FAQs Section -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5">Popular FAQs</h2>
            <div class="row">
                @foreach ($models as $data)
                <div class="col-md-6 mb-4 fade-in">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->title }}</h5>
                            <p class="card-text">{!! \Str::limit($data->body, 500, '...') !!}</p>
                            <a href="{{ url(route('docs').'?article_id='.$data->id) }}" class="card-link">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 text-center bg-success text-white">
        <div class="container">
            <h2 class="mb-3">Have more questions?</h2>
            <p class="lead">Browse our full FAQ or contact support for further assistance.</p>
            <a href="{{ route('docs') }}" class="btn btn-outline-light btn-lg">Explore More FAQs</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white text-center">
        <p class="mb-0">&copy; 2024 NiRA. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
