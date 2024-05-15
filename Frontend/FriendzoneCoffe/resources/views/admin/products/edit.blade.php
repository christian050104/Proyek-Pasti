@extends('admin.layouts.master')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Product</h1>
        <form action="{{ route('products.update', $product['ID']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product['name'] }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $product['description'] }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product['price'] }}" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $product['stock'] }}" required>
            </div>
            <div class="form-group">
                <label for="image">image:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                <input type="hidden" name="current_image" value="{{ $product['image'] }}">
                <div class="mt-2">
                    <p>Current Image:</p>
                    <img src="{{ asset($product['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                </div>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category['ID'] }}" {{ $category['ID'] == $product['category_id'] ? 'selected' : '' }}>{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
@endsection
