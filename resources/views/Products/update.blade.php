<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .error {
            border-color: red;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        
        <form method="post" action="{{ route('product.new', ['product' => $product]) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{$product->name}}" name="name" placeholder="Enter Name" required class="@error('name') error @enderror">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" value="{{$product->qty}}" name="qty" placeholder="Enter Quantity" required class="@error('qty') error @enderror">
                @error('qty')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text"  value="{{$product->price}}" name="price" placeholder="Enter Price" required class="@error('price') error @enderror">
                @error('price')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" value="{{$product->description}}" placeholder="Enter Description" required class="@error('description') error @enderror">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
