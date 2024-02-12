@extends('layout.main')

@section('container')
<h1>My Items</h1>
<br>

@foreach($items as $item)
<a href="/categories"">
<h4> Category: {{$item->category->category}}</h4>
</a>
<a href="/show-item/{{ $item->id }}"> 
<h4> Name: {{ $item->name }} </h4> 
</a>
<h5> Price: Rp {{ $item->price }} </h5>
<h5> Quantity: {{ $item->quantity }} </h5><br>
@endforeach

@endsection