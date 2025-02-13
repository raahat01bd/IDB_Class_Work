<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($student) ? $student->name : 'Students' }}'s Posts</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 20px;
        }

        .posts-container {
            width: 80%;
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .post {
            background-color: #fafafa;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 15px;
        }

        .post strong {
            color: #2c3e50;
            font-size: 1.2em;
        }

        .post p {
            font-size: 1.1em;
            margin-top: 10px;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .posts-container {
                width: 90%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="posts-container">
        <!-- Handle single student view -->
        @if(isset($student))
            <h1>{{ $student->name }}'s Posts</h1>
            @foreach ($student->posts as $post)
                <div class="post">
                    <strong>{{ $post->title }}</strong>
                    <p>{{ $post->body }}</p>
                </div>
            @endforeach

        <!-- Handle multiple students view -->
        @elseif(isset($students))
            <h1>All Students' Posts</h1>
            @foreach ($students as $student)
                <h2>{{ $student->name }}'s Posts</h2>
                @foreach ($student->posts as $post)
                    <div class="post">
                        <strong>{{ $post->title }}</strong>
                        <p>{{ $post->body }}</p>
                    </div>
                @endforeach
            @endforeach
        @endif
    </div>

</body>
</html>
