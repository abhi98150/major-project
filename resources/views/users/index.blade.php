@extends('backend.master')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-8B+N5SfiTxp6T/7Q0nGZ9jA8v5v5cME2yvvG+T5pD7B2wMlCcsuHO7H82OIjUydk" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="{{ asset('usersIndex/style.css') }}" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-5qV5l+nq8Vg91F6CRX3eo8A6w5PYiJ8Za3Xfw5T6CgRry3vEKxw16C05wPqRjB+qM" crossorigin="anonymous"></script>
    <!-- Custom JS -->
    <script src="{{ asset('usersIndex/script.js') }}"></script>
</head>
<body>
    <div class="container mt-4">
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create New</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary">Edit</a>
                            <a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

@endsection