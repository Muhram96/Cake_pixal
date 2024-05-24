<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources\css\bootstrap.css') }}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
    <link rel="stylesheet" href="{{ asset('resources\css\style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('resources\css\style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('resources\css\responsive.css') }}" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body>
<header>
    {{-- @livewire('navigation-menu')--}}
    @include('partials.header')
</header>

<main>
    @yield('content')
</main>

<footer>
    @include('partials.footer')
</footer>

<script src="{{asset('resources\javascript\jquery-3.4.1.min.js') }}"></script>
<script src="{{asset('resources\javascript\bootstrap.js') }}"></script>
<script src="{{asset('resources\javascript\circles.min.js') }}"></script>
<script src="{{asset('resources\javascript\custom.js') }}"></script>
<script src="{{asset('resources\javascript\slider.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
    $('.ba-carosel').slick({
        infinite: true,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        prevArrow: '<button type="button" class="custom-prev"><img src="{{asset('resources/images/left.png')}}" alt=""></button>',
        nextArrow: '<button type="button" class="custom-next"><img src="{{asset('resources/images/right.png')}}" alt=""></button>',
        responsive: [{
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
            }
        }, {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }]
    });
</script>

</body>

</html>


