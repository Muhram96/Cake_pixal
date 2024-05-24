@extends('layouts.app2')
<!-- about section -->
@section('content')

<!-- do section -->
<section class="do_section layout_padding">
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
</section>

<!-- end do section -->
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
@endsection
