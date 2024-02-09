<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid ms-5">
    <a class="navbar-brand" href="/">Tok Bargang</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Home')? 'active' : ''}} " aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'My Items')? 'active' : ''}}" href="/myitems">My Items</a>
        </li>       
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'About Me')? 'active' : ''}}" href="/aboutme">About Me</a>
        </li>
      </ul>
      @auth
      <ul class="navbar-nav ms-auto me-5">
        <li class="nav-item">
          <form action="/logout" method = "POST">
            @csrf
            <a class="nav-link {{ ($title === 'Logout')? 'active' : ''}}"><button type = "submit" class = "btn btn-dark"><i class="bi bi-box-arrow-left"></i> Logout</button></a>
          </form>
        </li>
      </ul>
      @else      
      <ul class="navbar-nav ms-auto me-5">
        <li class="nav-item">
          <a class="nav-link {{ ($title === 'Login')? 'active' : ''}}" href="{{ route('login') }}"><button class ="btn btn-dark"><i class="bi bi-box-arrow-in-right"></i> Login</button></a>
        </li>
      </ul>
      @endauth
    </div>
  </div>
</nav>  
<div class="container mt-5">
    @yield('container')
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>