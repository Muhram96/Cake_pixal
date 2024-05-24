<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('resources\css\bootstrap.css')}}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- Custom styles for this template -->
    <link href="{{asset('resources\css\style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('resources\css\responsive.css')}}" rel="stylesheet" />
    <style>
        .background-removal {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 30vh;
            background-color: #f4f4f4;
            padding: 20px;
            box-sizing: border-box;
        }

        .main {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .background-inner-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .image_url {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #333;
        }

        p {
            color: #666;
            margin: 10px 0;
        }

        .form-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .custom-file-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .custom-file-upload .icon {
            width: 50px;
            height: 50px;
            fill: #333;
        }

        .custom-file-upload .text {
            margin-top: 10px;
            color: #333;
        }

        input[type="file"] {
            display: none;
        }

        button.btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button.btn:hover {
            background-color: #0056b3;
        }

        .removing {
            color: #ff0000;
            margin-top: 20px;
        }

        .result {
            margin-top: 20px;
            text-align: center;
        }

        .result img {
            max-width: 400px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .form-content a {
            display: inline-block;
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
        }

        .result a:hover {
            background-color: #218838;
        }
        .image_url img{
            width:250px;
            height: 300px;
            text-align: center;

        }
    </style>
</head>

<body class="sub_page">
<!-- <div class="hero_area"> -->
<!-- header section strats -->
<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand" href="index.html">
                <img src="{{asset('resources\images\logo.png')}}" alt="" />
                <span>
                        Background Remove
            </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mr-2">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tools') }}">Tools</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact us</a>
                    </li>
                </ul>
                <div class="user_option">
                    <div class="login_btn-container">
                        <a href="">
                            Login
                        </a>
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
                    <a class="nav-link" href="{{ url('/about') }}">About </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
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

<!-- Image upload section start -->
<section class="background-removal">
    <div class="main">
        @if(!session('enhance_image'))
            <div class="background-inner-wrap">
                <h1>Image Background Remover</h1>
                <p class="p">Upload your image here.</p>
                <form id="uploadForm" action="{{ route('/enhanceimage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-content">
                        <label class="custom-file-upload" for="imgInp">
                            <div class="icon" id="uploadIcon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                                    <path d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="text" id="uploadText">
                                <span>Click to upload image</span>
                            </div>
                            <input type="file" id="imgInp" name="image_file" style="display: none;">
                        </label>
                        <div class="validationtext">
                            <p>Supported file types: jpg, jpeg, bmp, png, webp, tiff, tif, bitmap, raw, rgb, jfif, lzw</p>
                            <p>File size: Up to 15MB</p>
                        </div>
                        <img id="uploadedImage" src="#" alt="Uploaded Image" style="display:none; max-width:400px; margin-top:20px;"/>
                        <button id="submitButton" class="btn" type="submit">
                            Enhance Image
                        </button>
                    </div>

                </form>

            </div>
        @elseif(session('enhance_image'))
            <div class="image_url">
                <div class="form-content" id="image_url">
                    <img src="{{ session('enhance_image') }}" alt="Processed Image">
                    <a id="download" href="{{ session('enhance_image') }}" download>Click here to Download image</a>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Image upload section End -->

<!-- background Remover before after Section Start -->

<section class="about_section bg-remover layout_padding mt-0">
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
                        <img src="{{asset('resources\images\after.png')}}" alt="After" />
                    </div>

                    <div id="resizer"></div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- background Remover before after Section End -->

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

<section class="do_section layout_padding-bottom">
    <div class="container">
        <div class="custom_heading-container">
            <h2>
                More tools
            </h2>
        </div>
        <div class="row">
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
        </div>
    </div>
</section>
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
                                <img src="{{asset('resources\images\twitter-logo.png')}}" alt="" />
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <img src="{{asset('resources\images\instagram.png')}}" alt="" />
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <img src="{{asset('resources\images\linkedin-sign.png')}}" alt="" />
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
        &copy; 2024 All Rights Reserved By lorem ipsum
    </p>
</footer>
<!-- footer section -->


<script src="{{asset('resources\javascript\jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('resources\javascript\bootstrap.js')}}"></script>
<script src="{{asset('resources\javascript\circles.min.js')}}"></script>
<script src="{{asset('resources\javascript\custom.js')}}"></script>
<script src="{{asset('resources\javascript\slider.js')}}"></script>

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

<script>
    let imageURL;

    document.getElementById('submitButton').addEventListener('change', async function() {
        document.querySelector('#background-inner-wrap').style.display = 'none';

        const formData = new FormData();
        formData.append('image_file', image_file);

    });

    function downloadFile() {
        if (!imageURL) {
            alert("No image to download!");
            return;
        }
        const a = document.createElement('a');
        a.href = imageURL;
        a.download = 'background_removed_image.png';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#imgInp').change(function() {
            readURL(this);
        });

        $('#submitButton').click(function() {
            // Trigger form submission (if necessary) here
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#uploadedImage').attr('src', e.target.result).show();
                $('#uploadIcon').hide();
                $('#uploadText').hide();
                $('.validationtext').hide();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


</body>

</html>
