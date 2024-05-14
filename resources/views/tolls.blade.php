<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tolls') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="background-image">
                <div class="max-w-md bg-white p-8 rounded-lg shadow-lg">
                    <form id="uploadForm" action="{{ route('/changebackground') }}" method="POST" enctype="multipart/form-data">
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
                        <input id="image_file" type="file" name="image_file">
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
                        <p class="text-gray-700 mb-6">Click the button below to upload and enhance photo quality.</p>
                        <input id="image_file" type="file" name="image_file">
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

    <!-- Script to remove background image -->
    <script>

    </script>
</x-app-layout>
