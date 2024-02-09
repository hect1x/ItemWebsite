@extends('layout.main')

@section('container')

@foreach($category->items as $item)

<a href="/show-item/{{ $item->id }}"> 
<h4> Name: {{ $item->name }} </h4> 
</a>
<h5> Price: {{ $item->price }} </h5>
<h5> Quantity: {{ $item->quantity }} </h5><br>


@endforeach

@endsection