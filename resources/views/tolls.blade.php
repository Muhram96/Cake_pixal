<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tools') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background-image">
                <div class="max-w-md bg-white p-8 rounded-lg shadow-lg">
                    <form id="uploadForm" action="{{ route('/removebackground') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="text-3xl mb-4">Upload Image!</h2>
                        <p class="text-gray-700 mb-6">Click the button below to upload an image to remove the background.</p>
                        <input id="image_file" type="file" name="image_file">
                        <button id="submitButton" class="btn" type="">
                            Remove Background Image
                        </button>

                    </form>
                    @if(session('image'))
                        <img src="{{ session('image') }}" alt="Processed Image">
                        <a id="download" href="{{ session('image') }}" download>Click here to Download image</a>
                    @else
                        <p>No processed image available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background-image">
                <div class="max-w-md bg-white p-8 rounded-lg shadow-lg">
                    <form id="uploadForm" action="{{ route('/enhanceimage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="text-3xl mb-4">Upload Image!</h2>
                        <p class="text-gray-700 mb-6">Click the button below to upload and enhance photo quality.</p>
                        <input type="file" id="image_file"  name="image_file">
                        <button id="submitButton" class="btn" type="">
                            Enhance Image
                        </button>

                    </form>
                    @if(session('enhance_image'))
                        <img src="{{ session('enhance_image') }}" alt="Processed Image">
                        <a id="download" href="{{ session('enhance_image') }}" download>Click here to Download image</a>
                    @else
                        <p>No processed image available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background-image">
                <div class="max-w-md bg-white p-8 rounded-lg shadow-lg">
                    <form id="uploadForm" action="{{ route('/backgroundchange') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="text-3xl mb-4">Upload Image!</h2>
                        <p class="text-gray-700 mb-6">Click the button below to upload and Change Background image.</p>
                        <input type="file" id="imgInp" name="image_file" />
                        <img src="#" alt="Image" id="image">
                        <input type="text" name="prompt">
                        <button id="submitButton" class="btn" type="">
                            Change Background
                        </button>

                    </form>
                    @if(session('enhance_image'))
                        <img src="{{ session('enhance_image') }}" alt="Processed Image">
                        <a id="download" href="{{ session('enhance_image') }}" download>Click here to Download image</a>
                    @else
                        <p>No processed image available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background-image">
                <div class="max-w-md bg-white p-8 rounded-lg shadow-lg">
                    <form id="uploadForm" action="{{ route('/idphoto') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="text-3xl mb-4">Upload Image!</h2>
                        <p class="text-gray-700 mb-6">Click the button below to upload and get ID photo.</p>
                        <input type="file" id="image_file"  name="image_file">
                        <input type="text" id="bg_color"  name="bg_color">
                        <input type="text" id="size"  name="size">
                        <button id="submitButton" class="btn" type="">
                            Create ID photo
                        </button>

                    </form>
                    @if(session('id_image'))
                        <img src="{{ session('id_image') }}" alt="Processed Image">
                        <a id="download" href="{{ session('id_image') }}" download>Click here to Download image</a>
                    @else
                        <p>No processed image available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background-image">
                <div class="max-w-md bg-white p-8 rounded-lg shadow-lg">
                    <form id="uploadForm" action="{{ route('/colorimage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="text-3xl mb-4">Upload Image!</h2>
                        <p class="text-gray-700 mb-6">Click the button below to upload and color the image.</p>
                        <input type="file" id="image_file"  name="image_file">
                        <button id="submitButton" class="btn" type="">
                            Color Image
                        </button>

                    </form>
                    @if(session('color_image'))
                        <img src="{{ session('color_image') }}" alt="Processed Image">
                        <a id="download" href="{{ session('color_image') }}" download>Click here to Download image</a>
                    @else
                        <p>No processed image available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background-image">
                <div class="max-w-md bg-white p-8 rounded-lg shadow-lg">
                    <form id="uploadForm" action="{{ route('/compressedimage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="text-3xl mb-4">Upload Image!</h2>
                        <p class="text-gray-700 mb-6">Click the button below to upload and compressed the image.</p>
                        <input type="file" id="image_file"  name="image_file">
                        <button id="submitButton" class="btn" type="">
                            Compress Image
                        </button>

                    </form>
                    @if(session('compressed_image'))
                        <img src="{{ session('compressed_image') }}" alt="Processed Image">
                        <a id="download" href="{{ session('compressed_image') }}" download>Click here to Download image</a>
                    @else
                        <p>No processed image available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background-image">
                <div class="max-w-md bg-white p-8 rounded-lg shadow-lg">
                    <form id="uploadForm" action="{{ route('/crop_enhanceimage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="text-3xl mb-4">Upload Image!</h2>
                        <p class="text-gray-700 mb-6">Click the button below to upload and Crop the image.</p>
                        <input type="file" id="image_file"  name="image_file">
                        <button id="submitButton" class="btn" type="">
                            Crop and Enhance Image
                        </button>

                    </form>
                    @if(session('crop_image'))
                        <img src="{{ session('crop_image') }}" alt="Processed Image">
                        <a id="download" href="{{ session('crop_image') }}" download>Click here to Download image</a>
                    @else
                        <p>No processed image available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background-image">
                <div class="max-w-md bg-white p-8 rounded-lg shadow-lg">
                    <form id="uploadForm" action="{{ route('/ocrimage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="text-3xl mb-4">Upload Image!</h2>
                        <p class="text-gray-700 mb-6">Click the button below to upload and Crop the image.</p>
                        <input type="file" id="image_file"  name="image_file">
                        <button id="submitButton" class="btn" type="">
                            Convert to OCR
                        </button>

                    </form>
                    @if(session('ocr_image'))
                        <a id="download" href="{{ session('ocr_image') }}" download>Click here to Download image</a>
                    @else
                        <p>No processed image available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Script to remove background image -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#imgInp').change(function() {
                readURL(this);
            });
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>
