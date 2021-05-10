<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INS Camí de Mar</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/01ff7dab4a.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">

<header class="container">
  <div class="cap row">
    <!-- <img src="img/star2.png" class="img-fluid img-responsive"> -->

    <div class="col text-right p-4">
      <img src="{{url('img/logo_2.png')}}" class="logo float-left">
    </div>

    <div class="col p-4">
      <h2 class="float-left">INS Camí de Mar</h2>
      <p class="float-left">Web de l'INS Camí de Mar de Calafell</p>
    </div>
  </div>
</header>

  <!-- Navbar amb les opcions -->
  @if (Auth::check())
  <nav class="navbar dropdown navbar-expand-lg navbar-dark bg-dark">
    <ul>
      <li style="display:inline; text-decoration:none;"><a href="/cursos/index" style="color:white">Cursos</a></li>
      <li style="display:inline; text-decoration:none;"><a href="/pagaments/index" style="color:white">Pagaments</a></li>
      <li style="display:inline; text-decoration:none;"><a href="/categories/index" style="color:white">Categories</a></li>
      <li style="display:inline; text-decoration:none;"><a href="{{ url('/logout') }}" style="color:white; text-decoration:none;">Logout</a></li>
    </ul>
    <!--<a href="{{ url('/cursos/index') }}" style="color:white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Cursos
    </a>
    <a href="{{ url('/logout') }}" style="color:white" href="/categories/index" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Categories
    </a>
    <a href="/pagaments/index" style="color:white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Pagaments
    </a>
    <a href="{{ url('/logout') }}" style="color:white; text-decoration:none;"> Logout </a>-->
  </nav>
  @else
  <nav class="navbar dropdown navbar-expand-lg navbar-dark bg-dark">
    @inject('categories', 'App\Http\Controllers\CategoriaController')
    {{ $categories->showCategory() }}
    <a href="{{ url('/login') }}" style="color:white; text-decoration:none;">Login</a>
  </nav>
  @endif




  <div class="info p-3 px-5">
    @yield('content')
  </div>

  @yield('postscripts')


  <footer class="p-3 text-center">
    <a href="https://www.inscamidemar.cat/"><u>INS Camí de Mar</u> . </a>
    <a href="http://calafell.cat/">Calafell</a>
  </footer>

</div>
    
</body>
</html>
