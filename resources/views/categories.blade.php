@extends('layout.main')

@section('container')
<h1>Categories</h1>
<br>

@foreach($categories as $category)
<a href="/show-category/{{ $category->id }}" class = "mt-4"> <h4> {{$category->id}}. {{ $category->category }} </h4> </a>

@endforeach

@endsection