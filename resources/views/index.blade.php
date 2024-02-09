@extends('layout.main')

@section ('container')
<h1>Login</h1>
<form action = "/login" method = "POST" class = "mt-4">
  @csrf
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
  <button type="submit" class="btn btn-primary">Login</button>
  <small style = "display:block" class = "mt-4">No account yet? <a href="/register">Register Here</a></small>
</form>
@endsection