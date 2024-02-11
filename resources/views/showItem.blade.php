@extends('layout.main')


@section('container')
<h1>Item Details</h1><br>
<img src=" {{ asset('storage/item_images/'.$item->image) }} " alt= "{{ $item->name }} " style="width: 400px">
<a href="/categories"><h3> Category: {{$item->category->category}} </h3></a>
<h4> Name: {{$item->name}} </h4>
<h5> Price: Rp {{$item->price}} </h5>
<h5> Quantity: {{$item->quantity}} </h5>
<form action="/addCart/{{$item->id}}" method = "POST">
    @csrf    
    <br>
    <input type="number" value = "1" min = "1" class = "form-control" style = "width:100px" name = "quantity"> <br>
    <input class = "btn btn-primary"type="submit" value = "Add to Cart">
</form>
@can('is_admin')
<form action="/delete-item/{{ $item->id }}" method = "POST">
    @csrf
    @method("DELETE")
    <button type="submit" class="btn btn-danger mt-4" onclick = "return confirm('Delete {{$item->name}}?')">Delete</button><br>    
</form>
<a href="/edit-item/{{ $item->id }}"> <button type="submit" class="btn btn-warning mt-3">Edit</button></a>
@endcan


@endsection