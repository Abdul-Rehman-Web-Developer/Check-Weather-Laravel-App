<?php
 $home_link_active="";
 $get_access_token_link_active="";
 $register_link_active="";

switch (Route::currentRouteName()) {
  case 'home':
    $home_link_active="active";
    break;
  case 'get_access_token': 
    $get_access_token_link_active="active";
    break;
  case 'register':
    $register_link_active="active";
    break;
  
  
}
 if(Route::currentRouteName() == 'home')
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <title>@yield('page-title') - Check Weather</title>

  <!-- some necessary routes -->
  <meta name="get_countries" content="{{ route('get_countries') }}" />
  <meta name="get_cities" content="{{ route('get_cities') }}" />
   
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="{{ URL::to('public/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- sweetalert plugin  -->
  <link href="{{ URL::to('public/vendor/sweetalert/sweetalert.css') }}" rel="stylesheet"> 
    
  <!-- Custom styles -->
  <link href="{{ URL::to('public/assets/css/main.css') }}" rel="stylesheet">


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Check Weather</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item  {{$home_link_active}}">
            <a class="nav-link" href="{{ route('home') }}">
              Home
            </a>
          </li>
          <li class="nav-item {{$get_access_token_link_active}}">
            <a class="nav-link" href="{{ route('get_access_token') }}">
            Get Access Token
          </a>
          </li>
          <li class="nav-item {{$register_link_active}}">
            <a class="nav-link" href="{{ route('register') }}">
            Register
            </a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  @yield('page-content')



  <!-- Bootstrap core JavaScript -->
  <script src="{{ URL::to('public/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ URL::to('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Loading Overlay plugin -->
  <script src="{{ URL::to('public/vendor/jquery.loadingoverlay/loadingoverlay.min.js') }}"></script>
  <script src="{{ URL::to('public/vendor/jquery.loadingoverlay/loadingoverlay_progress.min.js') }}"></script>
  <!-- sweetalert plugin -->
  <script src="{{ URL::to('public/vendor/sweetalert/sweetalert.min.js') }}"></script>
  <!-- Parsely form validation plugin -->
  <script src="{{ URL::to('public/assets/js/parsley.min.js') }}"></script>
    
  <!-- Page specific Javascript -->
 
  @yield('page-scripts')

</body>

</html>


