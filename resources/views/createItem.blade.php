@extends('layout.main')

@section('container')
<h1>Create Item</h1>
<form action = "store-item" method = "POST" enctype = "multipart/form-data">
  @csrf
  <div class = "mb-3">
  <label for="exampleInputEmail1" class="form-label">Item Category</label>
  <select id="disabledSelect" class="form-select" name = "category_id">
        <option>Select Category</option>
        @foreach($categories as $category)
        <option value=" {{ $category->id }} "> {{ $category->category }} </option>
        @endforeach
      </select> 
    @error('category_id')
      <div class = "alert alert-danger"> Select a category </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Item Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'name' value = "{{ old('name') }}">
    @error('name')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Price</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'price' value = "{{ old('price') }}">
    @error('price')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'quantity' value = "{{ old('quantity') }}">
    @error('quantity')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Item Image</label>
    <input class="form-control" type="file" id="formFile" name = "image" value ="{{ old('image') }}">
    @error('image')
    <div class="alert alert-danger"> {{ $message }} </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection