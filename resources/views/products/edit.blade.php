@extends('backend.master')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<form action="{{ route('product.update', $product->id)}}" method='POST' enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input type="text" class="form-control" id="" aria-describedby="" name='name' value='{{$product->name}}'>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">price</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name='price' value='{{$product->price}}'>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">description</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name='description' value='{{$product->description}}'>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name='quantity' value='{{$product->quantity}}'>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">category</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name='category' value='{{$product->category}}'>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">status</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name='status' value='{{$product->status}}'>
  </div>    

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">image</label>
    <input type="file" class="form-control" id="" aria-describedby="emailHelp" name='image'>
  </div> 

  @If( $product->image)
  <a href=" {{ asset('uploads').'/'.$product->image }}" target='_blank'> <img src="{{ asset('uploads').'/'.$product->image }}" width='100px'  height='100px'> </a>
  @endif

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection