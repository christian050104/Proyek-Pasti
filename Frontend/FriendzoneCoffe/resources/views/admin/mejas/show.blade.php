@extends('admin.layouts.master')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Show Meja</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Meja Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama: {{ $meja['nama'] }}</h5>
                <p class="card-text"><strong>Status:</strong> {{ $meja['status'] }}</p>
                <p class="card-text"><strong>Deskripsi:</strong> {{ $meja['deskripsi'] }}</p>
                <div class="mb-3">
                    <strong>Gambar:</strong><br>
                    <img src="{{ asset($meja['gambar']) }}" alt="Meja Image" class="img-thumbnail" style="max-width: 300px;">
                </div>
                <a href="{{ route('mejas.index') }}" class="btn btn-secondary">Back to List</a>
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
