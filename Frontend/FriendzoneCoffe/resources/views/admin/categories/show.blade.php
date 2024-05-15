@extends('admin.layouts.master')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Category Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Category Details</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="detail">
                    <strong>Name:</strong> {{ $category['name'] }}
                </div>
                <div class="detail">
                    <strong>Image:</strong>
                    <img src="{{ asset($category['image']) }}" alt="{{ $category['name'] }}" class="img-fluid">
                </div>
                <div class="text-center">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
@endsection
