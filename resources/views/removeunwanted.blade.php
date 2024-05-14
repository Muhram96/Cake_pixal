<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Selection with Jcrop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/css/Jcrop.min.css">
</head>
<body>
<h1>Multi Selection with Jcrop</h1>
<form id="uploadForm" action="{{ route('/remove/obj') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" id="imgInp" name="image_file" />
    <img src="#" alt="Image" id="image">
    <input type="hidden" id="coordinates" name="rectangles" /> <!-- Hidden field for coordinates -->
    <button id="deleteSelection">Delete Selection</button>
    <button type="submit">Submit Selections</button> <!-- Submit button to send selections to server -->
</form>
@if(session('object_removed'))
    <img src="{{ session('object_removed') }}" alt="Processed Image">
    <a id="download" href="{{ session('object_removed') }}" download>Click here to Download image</a>
@else
    <p>No processed image available.</p>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.min.js"></script>
<script>
    $(document).ready(function() {
        var jcrop_api;
        var coordinates = []; // Array to store coordinates

        $('#imgInp').change(function() {
            readURL(this);
        });

        $('#uploadForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            // Update hidden field value with coordinates array
            var roundedCoordinates = roundCoordinates(coordinates);
            $('#coordinates').val(JSON.stringify(roundedCoordinates));
            // Submit the form
            this.submit();
        });

        $('#deleteSelection').click(function() {
            jcrop_api.setSelect([0, 0, 0, 0]);
        });

        var stage = $('#image').Jcrop({
            onSelect: function(c) {
                // Display the selected coordinates
                console.log('Selected coordinates: x=' + c.x + ', y=' + c.y + ', w=' + c.w + ', h=' + c.h);
                // Add coordinates to the array
                coordinates.push({
                    x: c.x,
                    y: c.y,
                    width: c.w,
                    height: c.h
                });
            },
            multi: true, // Enable multi selection
            allowSelect: true, // Allow new selections
            allowResize: true, // Allow resizing of selections
            allowMove: true // Allow moving of selections
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

    function roundCoordinates(coordinates) {
        return coordinates.map(function(coord) {
            return {
                x: Math.round(coord.x),
                y: Math.round(coord.y),
                width: Math.round(coord.width),
                height: Math.round(coord.height)
            };
        });
    }
</script>
</body>
</html>
