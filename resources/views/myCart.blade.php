@extends('layout.main')

@section('container')
<ul>
@foreach($userItems as $item)
    <li>
        <h4><a href="{{ route('removeItem', ['itemId' => $item->id]) }}">Remove</a></h4>
        <h3>{{ $item->name }} - Quantity: {{ $item->pivot->item_quantity }} - Price: Rp {{ $item->pivot->total_price }}</h3>
    </li>
@endforeach

</ul>

@endsection