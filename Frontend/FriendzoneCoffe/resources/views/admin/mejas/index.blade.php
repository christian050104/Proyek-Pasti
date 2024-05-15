
@extends('admin.layouts.master')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Mejas</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">List of Mejas</h1>
        <a href="{{ route('mejas.create') }}" class="btn btn-primary mb-3">Create New Meja</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Deskripsi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mejas as $meja)
                        <tr>
                            <td>{{ $meja['nama'] }}</td>
                            <td>{{ $meja['status'] }}</td>
                            <td>{{ $meja['deskripsi'] }}</td>
                            <td>
                                <a href="{{ route('mejas.show', $meja['ID']) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('mejas.edit', $meja['ID']) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('mejas.destroy', $meja['ID']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

@endsection
