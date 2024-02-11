@extends('layout.main')
@section('container')
    <form action="checkout" method = "POST">
        @csrf
        @foreach($cart as $carts)
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h4>{{ $carts->item_name }} - Quantity: {{ $carts->total_quantity }} - Price: Rp {{ $carts->total_price }}</h4>
                </div>
                <div>
                    <a class="btn btn-danger" href="/deleteCart/{{ $carts->id }}">Remove</a>
                </div>
            </div>
        @endforeach
        <div>
            <br><br><h4>Total Price: Rp {{ $totalPrice }}</h4>
        </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'address' value = "{{ old('address') }}">
    @error('address')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Postal Code</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = 'postal' value = "{{ old('postal') }}">
    @error('postal')
      <div class = "alert alert-danger"> {{$message}} </div>
    @enderror
  </div>
        <button class="btn btn-dark">Checkout</button>
    </form>
@endsection
