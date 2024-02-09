@extends('layout.main')

@section('container')
<h1>Register</h1>
<form action = "/register" method = "POST" class = "mt-4">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'name' value = "{{ old('name') }}">
    @error('name')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'email' value = "{{ old('email') }}">
    @error('email')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="passwword" aria-describedby="emailHelp" name = 'password' value = "{{ old('password') }}">
    @error('password')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="number" class="form-label">Number</label>
    <input type="text" class="form-control" id="number" aria-describedby="numberHelp" name='number' value="{{ old('number') }}">
    @error('number')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div>

  <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection