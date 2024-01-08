@extends('layout.main')

@section('container')
<h1>My Items</h1>
<br>

@foreach($items as $item)
<a href="/show-item/{{ $item->id }}"><h3> Category: {{$item->category}} </h3></a>
<h4> Name: {{ $item->name }} </h4>
<h5> Price: {{ $item->price }} </h5>
<h5> Quantity: {{ $item->quantity }} </h5><br>
@endforeach

@endsection