<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Styled Table</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5.0.0-beta.4/daisyui.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
  <div class="overflow-x-auto">
    <button><a href="{{route('create')}}">Create</a></button>
    <table class="table table-zebra w-full border border-gray-300 shadow-lg rounded-lg">
      <thead>
        <tr class="bg-gray-800 text-white text-left">
          <th class="p-3">ID</th>
          <th class="p-3">Name</th>
          <th class="p-3">Contact</th>
          <th class="p-3">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($flights as $ss)
        <tr class="hover:bg-gray-200">
          <td class="p-3 border">{{$ss->id}}</td>
          <td class="p-3 border">{{$ss->name}}</td>
          <td class="p-3 border">{{$ss->email}}</td>
          <td class="p-3 border">
            {{-- delete form --}}
            <form action="{{route('edit', $ss->id)}}" method="post">
              @csrf
              @method('UPDATE')
              <button type="submit" class="text-white bg-green-500 hover:bg-green-700 px-4 py-2 rounded-md">Edit</button>
            </form>
            <form action="{{route('delete', $ss->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-white bg-red-500 hover:bg-red-700 px-4 py-2 rounded-md">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach 
      </tbody>
    </table>
  </div>
</body>
</html>