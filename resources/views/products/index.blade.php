@extends('vendor.dashboard')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Create New</a>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
      <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">price</th>
      <th scope="col">description</th>
      <th scope="col">Quantity</th>
      <th scope="col">status</th>
      <th scope="col">category</th>
      <th scope="col">image</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
   @foreach($products as $product)
    <tr>
      <th scope="row">{{ $loop->iteration}}</th>
      <td>{{ $product->name ?? ''}}</td>
      <td>{{ $product->price ?? ''}}</td>
      <td>{{ $product->description ?? ''}}</td>
      <td>{{ $product->quantity ?? ''}}</td>
      <td>{{ $product->status ?? ''}}</td>
      <td>{{ $product->category ?? ''}}</td>
    
      <td> <a href=" {{ asset('uploads').'/'.$product->image }}" target='_blank'> <img src="{{ asset('uploads').'/'.$product->image }}" width='100px'  height='100px'> </a></td>
      <td>

      <a href='{{route("product.edit",$product->id)}}'  class='btn btn-primary'> EDIT </a><br>
      <a href='{{route("product.delete",$product->id)}}'  class='btn btn-danger'> DELETE </a>
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