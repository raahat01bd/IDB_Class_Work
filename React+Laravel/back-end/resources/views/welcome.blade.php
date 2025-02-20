<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>
    <h1>Students</h1>
    {{-- <a href="{{ route('welcome') }}">Add New Student</a> --}}
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>department</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->department }}</td>
                    <td>{{ $student->email }}</td>
                  
                    <td>
                        {{-- <a href="{{ route('', $student->id) }}">Edit</a> --}}
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
