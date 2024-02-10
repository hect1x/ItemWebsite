@extends('layout.main')

@section('container')
<form action = "{{ route('updateCart', ['item' => $item->id]) }}" method = "POST">
    @csrf
<h1>Item Details</h1><br>
<img src=" {{ asset('storage/item_images/'.$item->image) }} " alt= "{{ $item->name }} " style="width: 400px">
<h4> Name: {{$item->name}} </h4>
<h5> Price: Rp {{$item->price}} </h5>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'quantity' value = "{{ old('quantity') }}">
    @error('quantity')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection