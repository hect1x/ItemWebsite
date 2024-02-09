@extends('layout.main')

@section ('container')
<h1>Create Category</h1>
<form action = "store-category" method = "POST">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'category_name' value = "{{ old('category_name') }}">
    @error('category_name')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection