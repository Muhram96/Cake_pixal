<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        window.csrfToken = "{{ csrf_token() }}";
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Object Removal Brush</title>
    <style>
        #canvas {
            border: 2px solid black;
            cursor: crosshair;
        }
    </style>
</head>
<body>
<h1>Object Removal Brush</h1>
<input type="file" id="uploadInput" accept="image/*">
<canvas id="canvas" width="800" height="600"></canvas>
<button id="clearButton">Clear</button>
<button id="sendButton">Send Marked Image</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');
    let isDrawing = false;
    let markings = [];
    let image;

    // Function to draw markings on canvas
    function drawMarkings() {
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.drawImage(image, 0, 0, canvas.width, canvas.height);
        context.lineWidth = 2;
        context.strokeStyle = 'red';
        markings.forEach(mark => {
            context.beginPath();
            context.arc(mark.x, mark.y, 5, 0, Math.PI * 2);
            context.stroke();
        });
    }

    // Event listener for mouse down
    canvas.addEventListener('mousedown', (e) => {
        isDrawing = true;
        markings.push({ x: e.offsetX, y: e.offsetY });
        drawMarkings();
    });

    // Event listener for mouse move
    canvas.addEventListener('mousemove', (e) => {
        if (isDrawing) {
            markings.push({ x: e.offsetX, y: e.offsetY });
            drawMarkings();
        }
    });

    // Event listener for mouse up
    canvas.addEventListener('mouseup', () => {
        isDrawing = false;
    });

    // Event listener for clear button
    document.getElementById('clearButton').addEventListener('click', () => {
        markings = [];
        drawMarkings();
    });

    // Event listener for upload input
    document.getElementById('uploadInput').addEventListener('change', (e) => {
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = function (event) {
            image = new Image();
            image.onload = function () {
                canvas.width = image.width;
                canvas.height = image.height;
                context.drawImage(image, 0, 0, canvas.width, canvas.height);
            };
            image.src = event.target.result;
        };
        reader.readAsDataURL(file);
    });

    // Event listener for send button
    document.getElementById('sendButton').addEventListener('click', () => {
        // Create a hidden canvas to draw the marked image
        const hiddenCanvas = document.createElement('canvas');
        hiddenCanvas.width = canvas.width;
        hiddenCanvas.height = canvas.height;
        const hiddenContext = hiddenCanvas.getContext('2d');
        hiddenContext.drawImage(image, 0, 0, hiddenCanvas.width, hiddenCanvas.height);
        markings.forEach(mark => {
            hiddenContext.beginPath();
            hiddenContext.arc(mark.x, mark.y, 5, 0, Math.PI * 2);
            hiddenContext.strokeStyle = 'red';
            hiddenContext.lineWidth = 2;
            hiddenContext.stroke();
        });

        // Convert marked image to base64 data URL
        const markedImageData = hiddenCanvas.toDataURL('image/jpeg');

        // Send marked image to the server using AJAX
        document.getElementById('sendButton').addEventListener('click', () => {
            // Convert marked image to base64 data URL
            const markedImageData = hiddenCanvas.toDataURL('image/jpeg');

            // Send marked image to the server using AJAX
            $.ajax({
                type: 'POST',
                url: '{{ route('/api/unwantedremove') }}',
                headers: {
                    'X-CSRF-TOKEN': window.csrfToken // Include the CSRF token in the headers
                },
                data: {
                    markedImageData: markedImageData
                },
                success: function(response) {
                    console.log('Response:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
</body>
</html>
