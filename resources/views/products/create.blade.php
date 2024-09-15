@extends('vendor.dashboard')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<form action="{{ route('product.store')}}" method='POST' enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name <span style='color:red;'>*</span></label>
    <input type="text" class="form-control" id="" aria-describedby="" name='name' value="{{ old('name') }}">
    @if( $errors->first('name'))
    <span style='color:red;'> {{ $errors->first('name') ?? '' }}</span>
    @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">price</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name='price'>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">description</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name='description'>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name='quantity'>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">category</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name='category'>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">status</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name='status'>
  </div>    

 <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">image</label>
    <input type="file" class="form-control" id="" aria-describedby="emailHelp" name='image'>
  </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
@endsection