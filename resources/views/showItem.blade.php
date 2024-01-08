@extends('layout.main')


@section('container')
<h1>Item Details</h1><br>
<h3> Category: {{$item->category}} </h3>
<h4> Name: {{$item->name}} </h4>
<h5> Price: {{$item->price}} </h5>
<h5> Quantity: {{$item->quantity}} </h5>

<form action="/delete-item/{{ $item->id }}" method = "POST">
    @csrf
    @method("DELETE")
    <button type="submit" class="btn btn-danger mt-4" onclick = "return confirm('Delete {{$item->name}}?')">Delete</button><br>    
</form>
<a href="/edit-item/{{ $item->id }}"> <button type="submit" class="btn btn-warning mt-3">Edit</button></a>


@endsection