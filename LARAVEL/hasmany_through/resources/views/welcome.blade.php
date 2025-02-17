<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Products</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>



    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employee as $emp)
                @foreach($emp->products as $product)
                    <tr>
                        <!-- Display Employee Details -->
                        <td>{{ $emp->id }}</td>
                        <td>{{ $emp->name }}</td>
                        <td>{{ $emp->email }}</td>

                        <!-- Display Product Details -->
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>tk-{{($product->price) }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

</body>
</html>
