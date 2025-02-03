<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Design with jQuery</title>
    <!-- CSS for styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #444;
            margin-top: 20px;
        }
        p {
            text-align: center;
            font-size: 16px;
        }
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        p.dynamic {
            text-align: center;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <h1>First Design with jQuery</h1>
    <p>This is a simple example of a webpage using jQuery.</p>
    
    <button id="changeColor">Change Color</button>

    <!-- Include jQuery from official CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function () {
            // Change background color on button click
            $('#changeColor').click(function () {
                $('body').css('background-color', 'lightblue');
                $('<p class="dynamic">New paragraph added dynamically.</p>').appendTo('body');
            });
        });
    </script>
</body>
</html>
