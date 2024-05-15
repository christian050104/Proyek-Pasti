@extends('admin.layouts.master')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Edit Category</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Category</h1>
        <form action="{{ route('categories.update', $category['ID']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category['name'] }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                <input type="hidden" name="current_image" value="{{ $category['image'] }}">
                @if($category['image'])
                <p>Current Image:</p>
                <img src="{{ asset($category['image']) }}" alt="Current Image" class="img-thumbnail">
                @endif
            </div>
            <button type="submit" class="btn btn-success">Update Category</button>
        </form>
        <div class="text-center mt-3">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
@endsection
