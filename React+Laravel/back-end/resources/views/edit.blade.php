<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $student->name }}" required><br><br>
        <label for="department">Department:</label>
        <input type="text" id="department" name="department" value="{{ $student->department }}" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $student->email }}" required><br><br>

        

       

        <button type="submit">Update Student</button>
    </form>
</body>
</html>
