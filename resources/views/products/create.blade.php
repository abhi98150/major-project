@extends('backend.master')
@section('content')
 

    
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
@endsection