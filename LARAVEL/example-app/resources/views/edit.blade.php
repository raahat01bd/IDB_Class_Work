<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white shadow-lg rounded-lg p-6 w-96">
        <h2 class="text-2xl font-bold text-center mb-4">Edit User</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="input input-bordered w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input input-bordered w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-between">
                <a href="{{ route('index') }}" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded-md">Back</a>
                <button type="submit" class="btn btn-primary px-4 py-2">Update</button>
            </div>
        </form>
    </div>

</body>
</html>
