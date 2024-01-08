 @extends('layout.main')
@section('container')
    <h1>About Me</h1> <br>
    <h2>Name: {{$name}} </h2>
    <h3>Email: {{$email}} </h3>
    <h3>Number: {{$number}} </h3>
    <img src="img/mog.png" align="right" align = "" height = 600px width = 600px alt="" srcset="">
@endsection
