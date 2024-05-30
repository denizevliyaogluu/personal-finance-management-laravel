@extends('layouts.master')
@section('title', 'Homepage')
@section('content')
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<div id="loading" class="text-center">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <p class="mt-2">Loading...</p>
</div>

<!-- Slider Container -->
<div id="sliderContainer" style="display: none;">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('upload/finance.png') }}" class="d-block w-100" alt="Finance Background">
            <div class="carousel-caption d-md-block">
                <h1>Personal Finance Manager</h1>
                <p>Take control of your finances today.</p>
                <a href={{route('learnMore')}} class="btn btn-dark">Learn More</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('upload/investment.png') }}" class="d-block w-100" alt="Second slide">
            <div class="carousel-caption d-md-block">
                <h1>Manage Your Investments</h1>
                <p>Optimize your investment portfolio.</p>
                <a href={{route('learnMore')}} class="btn btn-dark">Explore Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('upload/spending.png') }}" class="d-block w-100" alt="Third slide">
            <div class="carousel-caption d-md-block">
                <h1>Track Your Spending</h1>
                <p>Keep track of your expenses effortlessly.</p>
                <a href={{route('login')}} class="btn btn-dark">Get Started</a>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>

@endsection

<!-- Custom CSS -->
<style>
    .carousel-caption {
        background-color: rgba(0, 0, 0, 0.6);
        padding: 20px;
        border-radius: 10px;
    }
    .carousel-item img {
        height: 850px;
        object-fit: cover;
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        padding: 15px;
    }
    .btn-dark {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-dark:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    #loading {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999; /* Ensure it's on top of everything */
        background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5); /* Drop shadow */
    }

    /* Spinner style */
    .spinner-border {
        width: 4rem; /* Reduce spinner size */
        height: 4rem; /* Reduce spinner size */
    }
</style>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    // Wait for the page to load completely
    $(window).on('load', function() {
        // Hide the loading animation
        $('#loading').fadeOut();
        // Show the slider container
        $('#sliderContainer').fadeIn();
    });
</script>