@extends('admin.layouts.master')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Categories</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Categories</h1>

        <div class="text-center mb-4">
            <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
        </div>

        <!-- Menampilkan Kategori-kategori -->
        <ul class="list-group">
            @foreach ($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $category['name'] }}
                <div class="category-actions">
                    <a href="{{ route('categories.show', $category['ID']) }}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{ route('categories.edit', $category['ID']) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('categories.destroy', $category['ID']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
@endsection
