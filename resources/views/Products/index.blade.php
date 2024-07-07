<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .new-product {
            background-color: #dff0d8;
            animation: fadeIn 1s;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <h1>Allocation Rates</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr class="{{ $loop->last ? 'new-product' : '' }}">
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('product.update', ['product' => $product]) }}">Change</a>
                    </td>
                    <td>
                        <form action="{{route('product.delete',['product'=>$product]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type='submit' value="Delete"/>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
<a href="{{route('product.create'}}">Add New Product</a>
    </div>
</body>
</html>
