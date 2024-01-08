@extends('layout.main')

@section('container')
<h1>Editing Item</h1>
<form action="/update-item/{{ $item->id }}" method = "POST">
    @csrf
    @method('PATCH')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Item Category</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'category' value = "{{ old('category',$item->category) }}">
    @error('title')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Item Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'name' value = "{{ old('name', $item->name) }}">
    @error('name')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Price</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'price' value = "{{ old('price', $item->price) }}">
    @error('price')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'quantity' value = "{{ old('quantity', $item->quantity) }}">
    @error('quantity')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection