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
                    <form action="">
                        <h2 class="text-3xl mb-4">Upload Image!</h2>
                        <p class="text-gray-700 mb-6">Click the button below to upload an image to remove the background.</p>
                        <input type="file" name="image">
                        <button class="btn" type="submit">
                            Remove Background Image
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Script to remove background image -->
<script>
    const removeBgBtn = document.getElementById('removeBgBtn');
    removeBgBtn.addEventListener('click', function() {
        document.querySelector('.background-image').style.backgroundImage = 'none';
    });
</script>
</x-app-layout>
