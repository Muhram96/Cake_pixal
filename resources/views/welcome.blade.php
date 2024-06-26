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

    <title>Background Remove</title>

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
</head>


<body>


<!-- <div class="hero_area"> -->
<!-- header section strats -->
<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="" />

                <span>
            Cake Pixel
            </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mr-2">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/tolls') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.html">Tools</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact us</a>
                    </li>
                </ul>
                <div class="user_option">
                    <div class="login_btn-container">
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            Dashboard
                        </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Login
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                >
                                    Register
                                </a>
                                @endif
                                @endauth
                            </nav>
                            @endif
                    </div>
                    <form class="form-inline my-2 my-lg-0">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                    </form>
                </div>
            </div>
            <div class="call_btn">
                <a href="">
                    Call: +01234567890
                </a>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->
<!-- </div> -->

<!-- custom menu -->
<div class="custom_menu-container">
    <div class="container">
        <div class="custom_menu">
            <ul class="navbar-nav ">
                <li class="nav-item active">
                    <a class="nav-link pl-0" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/tools') }}">Tools</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact us</a>
                </li>
            </ul>
            <div class="user_option">
                <div class="login_btn-container">
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                >
                                    Dashboard
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                >
                                    Login
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- custom menu -->

<!-- about section -->

<section class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="img-box">
                    <img src="{{asset('resources\images\about-img.png')}}" alt="" />
                </div>
            </div>
            <div class="col-md-5">
                <div class="detail-box">
                    <div class="custom_heading-container">
                        <h2>
                            About Design
                        </h2>
                    </div>

                    <p>
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here
                        , content here', making it
                    </p>
                    <div>
                        <a href="">
                            About More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Image tools section -->
<section class="do_section layout_padding-bottom">
    <div class="container">
        <div class="custom_heading-container">
            <h2>
                Image tools
            </h2>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="content-box bg-red">
                    <div class="img-box">
                        <a href="{{ route('/view') }}">
                            <img src="{{asset('resources\images\bg remove.png')}}" alt="" />
                        </a>
                    </div>
                    <div class="detail-box">
                        <h6>
                            Background Removal
                        </h6>
                        <p>
                            Effortlessly erase distractions, enhance focus with our precise Background Removal service. Try it now!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="content-box bg-green">
                    <div class="img-box">
                        <img src="{{asset('resources\images\photo color.png')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h6>
                            Image Enhancement
                        </h6>
                        <p>
                            Transform ordinary images into stunning masterpieces with our professional Image Enhancement service.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="content-box bg-red">
                    <div class="img-box">
                        <img src="{{asset('resources\images\bg gen.png')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h6>
                            Background Generator
                        </h6>
                        <p>
                            Instantly create captivating backgrounds tailored to your needs with our Background Generator.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="content-box bg-green">
                    <div class="img-box">
                        <img src="{{asset('resources\images\object-remove.png')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h6>
                            Object Removal
                        </h6>
                        <p>
                            Effortlessly erase unwanted objects from your photos with our powerful Object Removal service.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="content-box bg-red">
                    <div class="img-box">
                        <img src="{{asset('resources\images\image-editing.png')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h6>
                            Photo Colorization
                        </h6>
                        <p>
                            Revive old memories with vibrant hues. Photo colorization service brings history to life.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="content-box bg-green">
                    <div class="img-box">
                        <img src="{{asset('resources\images\image compress.png')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h6>
                            Image Compression
                        </h6>
                        <p>
                            Efficiently shrink file sizes without sacrificing image quality. Perfect for faster loading.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="content-box bg-red">
                    <div class="img-box">
                        <img src="{{asset('resources\images\indetity.png')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h6>
                            Identity Photo
                        </h6>
                        <p>
                            Capture your essence in a professional identity photo for official documents and profiles.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="content-box bg-green">
                    <div class="img-box">
                        <img src="{{asset('resources\images\crop.png')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h6>
                            Photo Crop API
                        </h6>
                        <p>
                            Effortlessly crop and resize images with precision using our intuitive Photo Crop API service.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Images tools section -->

<!-- Orignal and transperant background Section Start -->
<div class="container">
    <div class="ba-carosel mb-5">
        <div class="ba-items">
            <img src="{{asset('resources\images\10.jpg')}}" alt="" />
            <h6>Orignal</h6>
        </div>
        <div class="ba-items"><img src="{{asset('resources\images\11.jpg')}}" alt="" />
            <h6>Transparent Background</h6>
        </div>
        <div class="ba-items"><img src="{{asset('resources\images\Kid.png')}}" alt="" />
            <h6>Orignal</h6>
        </div>
        <div class="ba-items"><img src="{{asset('resources\images\kid after.png')}}" alt="" />
            <h6>Transparent Background</h6>
        </div>
        <div class="ba-items"><img src="{{asset('resources\images\10.jpg')}}" alt="" />
            <h6>Orignal</h6>
        </div>
        <div class="ba-items"><img src="{{asset('resources\images\11.jpg')}}" alt="" />
            <h6>Transparent Background</h6>
        </div>
    </div>
</div>

<!-- Orignal and transperant background Section end -->
<!-- skill section -->

<section class="skill_section layout_padding2">
    <div class="container">
        <div class="custom_heading-container">
            <h2>
                Our Skills
            </h2>
        </div>
        <div class="skill_padding">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="box">
                        <div class="circle" id="circles-1"></div>
                        <h6>
                            Adobe Photoshop
                        </h6>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="box">
                        <div class="circle" id="circles-2"></div>
                        <h6>
                            Adobe Ilustrator
                        </h6>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="box">
                        <div class="circle" id="circles-3"></div>
                        <h6>
                            After Effects
                        </h6>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="box">
                        <div class="circle" id="circles-4"></div>
                        <h6>
                            Adobe XD
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end skill section -->

<!-- background Remover before after Section Start -->

<section class="about_section bg-remover layout_padding mt-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-5">
                <div class="detail-box">
                    <div class="custom_heading-container">
                        <h2>
                            Remove backgrounds 100% automatically in 5 seconds with one click
                        </h2>
                    </div>

                    <p>
                        No matter if you want to make a background transparent (PNG), add a white background to a photo, extract or isolate the subject, or get the cutout of a photo - you can do all this and more with us.
                    </p>
                    <div>
                        <a href="">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="before-after-slider">
                    <div id="before-image">
                        <img src="{{asset('resources\images\before.jpeg')}}" alt="before" />
                    </div>

                    <div id="after-image">
                        <img src="{{asset('resources\images/after.png')}}" alt="After" />
                    </div>

                    <div id="resizer"></div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- background Remover before after Section End -->

<!-- client section -->
<section class="client_section layout_padding-bottom">
    <div class="container">
        <div class="custom_heading-container">
            <h2>
                Testimonial
            </h2>
        </div>
    </div>

    <div class="container">
        <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="client_container layout_padding2">
                        <div class="client_box b-1">
                            <div class="client-id">
                                <div class="img-box">
                                    <img src="{{asset('resources\images\client-1.jpg')}}" alt="" />
                                </div>
                                <div class="name">
                                    <h5>
                                        smirth jon
                                    </h5>
                                    <p>
                                        client
                                    </p>
                                </div>
                            </div>
                            <div class="detail">
                                <p>
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
                                    content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making
                                    it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                                </p>
                            </div>
                        </div>
                        <div class="client_box b-2">
                            <div class="client-id">
                                <div class="img-box">
                                    <img src="{{asset('resources\images\client-2.jpg')}}" alt="" />
                                </div>
                                <div class="name">
                                    <h5>
                                        smirth den
                                    </h5>
                                    <p>
                                        client
                                    </p>
                                </div>
                            </div>
                            <div class="detail">
                                <p>
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
                                    content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making
                                    it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="client_container layout_padding2">
                        <div class="client_box b-1">
                            <div class="client-id">
                                <div class="img-box">
                                    <img src="{{asset('resources\images\client-1.jpg')}}" alt="" />
                                </div>
                                <div class="name">
                                    <h5>
                                        smirth jon
                                    </h5>
                                    <p>
                                        client
                                    </p>
                                </div>
                            </div>
                            <div class="detail">
                                <p>
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
                                    content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making
                                    it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                                </p>
                            </div>
                        </div>
                        <div class="client_box b-2">
                            <div class="client-id">
                                <div class="img-box">
                                    <img src="{{asset('resources\images\client-2.jpg')}}" alt="" />
                                </div>
                                <div class="name">
                                    <h5>
                                        smirth den
                                    </h5>
                                    <p>
                                        client
                                    </p>
                                </div>
                            </div>
                            <div class="detail">
                                <p>
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
                                    content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making
                                    it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="client_container layout_padding2">
                        <div class="client_box b-1">
                            <div class="client-id">
                                <div class="img-box">
                                    <img src="{{asset('resources\images\client-1.jpg')}}" alt="" />
                                </div>
                                <div class="name">
                                    <h5>
                                        smirth jon
                                    </h5>
                                    <p>
                                        client
                                    </p>
                                </div>
                            </div>
                            <div class="detail">
                                <p>
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
                                    content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making
                                    it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                                </p>
                            </div>
                        </div>
                        <div class="client_box b-2">
                            <div class="client-id">
                                <div class="img-box">
                                    <img src="{{asset('resources\images\client-2.jpg')}}" alt="" />
                                </div>
                                <div class="name">
                                    <h5>
                                        smirth den
                                    </h5>
                                    <p>
                                        client
                                    </p>
                                </div>
                            </div>
                            <div class="detail">
                                <p>
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
                                    content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making
                                    it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<!-- end client section -->

<!-- contact section -->

<section class="contact_section ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 offset-lg-2 col-md-5 offset-md-1">
                <h2 class="custom_heading">Contact Us</h2>
                <form action="#">
                    <div>
                        <input type="text" placeholder="Name" />
                    </div>
                    <div>
                        <input type="email" placeholder="Email" />
                    </div>
                    <div>
                        <input type="text" placeholder="Pone Number" />
                    </div>
                    <div>
                        <input type="text" class="message-box" placeholder="Message" />
                    </div>
                    <div class="d-flex  mt-4 ">
                        <button>
                            SEND
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 px-0">
                <div class="img-box">
                    <img src="{{asset('resources\images\contact.jpg')}}" alt="" class="w-100" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end contact section -->

<!-- info section -->
<section class="info_section layout_padding-top layout_padding2-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="info_links pl-lg-5">
                    <h4>
                        Menu
                    </h4>
                    <ul>
                        <li class="active">
                            <a href="index.html">  Home </a>
                        </li>
                        <li>
                            <a class="" href="tools.html">Tools</a>
                        </li>
                        <li>
                            <a href="about.html">  About </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="info_contact">
                    <h4>
                        Location
                    </h4>
                    <div>
                        <img src="{{asset('resources\images\location.png')}}" alt="" />
                        <p>
                            104 loram ipusm
                        </p>
                    </div>
                    <div>
                        <img src="{{asset('resources\images\telephone.png')}}" alt="" />
                        <p>
                            ( +01 1234567890 )
                        </p>
                    </div>
                    <div>
                        <img src="{{asset('resources\images\envelope.png')}}" alt="" />
                        <p>
                            demo@gmail.com
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info_social">
                    <h4>
                        Social Link
                    </h4>
                    <div class="social_container">
                        <div>
                            <a href="">
                                <img src="{{asset('resources\images\facebook-logo.png')}}" alt="" />
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <img src="{{asset('resources\images\twitter-logo.png')}}'" alt="" />
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <img src="{{asset('resources\images\instagram.png')}}" alt="" />
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <img src="{{asset('resources\images\linkedin-sign.png')}}'" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="info_form">
                    <h4>
                        Newsletter
                    </h4>
                    <form action="#">
                        <input type="text" placeholder="Enter Your Email" />
                        <button type="submit">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end info_section -->

<!-- footer section -->
<footer class="container-fluid footer_section">
    <p>
        &copy; 2024 All Rights Reserved By loram Ipsum
    </p>
</footer>
<!-- footer section -->

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
