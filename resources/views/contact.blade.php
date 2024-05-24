@extends('layouts.guest2')
<!-- contact section -->
@section('content')
<section class="contact_section">
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
                    <img src="{{ asset('resources\images\contact.jpg')}}" alt="" class="w-100" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end contact section -->


@endsection
