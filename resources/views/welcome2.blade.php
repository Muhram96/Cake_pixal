@extends('layouts.guest2')
<!-- about section -->
@section('content')
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
                        <a href="{{ route('/Eview') }}">
                             <img src="{{asset('resources\images\photo color.png')}}" alt="" />
                        </a>
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
                        <a href="{{ route('/Gview') }}">
                            <img src="{{asset('resources\images\bg gen.png')}}" alt="" />
                        </a>
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
                        <a href="{{ route('/unwantedobj') }}">
                            <img src="{{asset('resources\images\object-remove.png')}}" alt="" />
                        </a>
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
                        <a href="{{ route('/Cview') }}">
                             <img src="{{asset('resources\images\image-editing.png')}}" alt="" />
                        </a>
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
                        <a href="{{ route('/Cpview') }}">
                            <img src="{{asset('resources\images\image compress.png')}}" alt="" />
                        </a>
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
                        <a href="{{ route('/IDview') }}">
                            <img src="{{asset('resources\images\indetity.png')}}" alt="" />
                        </a>
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
                        <a href="{{ route('/CEview') }}">
                            <img src="{{asset('resources\images\crop.png')}}" alt="" />
                        </a>
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
@endsection
