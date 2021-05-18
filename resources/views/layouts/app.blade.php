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

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="/home">Inici</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link" href="/cursos/index">Cursos <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="/pagaments/index">Pagaments <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="/categories/index">Categories <span class="sr-only">(current)</span></a>
              </li>

              @if(Auth::user()->perfil === 1)

              <li class="nav-item active">
                <a class="nav-link" href="/users/index">Usuaris <span class="sr-only">(current)</span></a>
              </li>

              @endif

            </ul>

              <button type="button" class="btn btn-default btn-lg text-light">
                <a class="nav-link text-light" href="{{ url('/logout') }}">Logout <span class="sr-only">(current)</span></a>
              </button>

          </div>
        </nav>

  @else
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="{{ url('/login') }}">Inici</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
              @inject('categories', 'App\Http\Controllers\CategoriaController')
              {{ $categories->showCategory() }}
            </li>

          </ul>

            <button type="button" class="btn btn-default btn-lg text-light">
              <a class="text-light" href="{{ url('/register') }}">Register <span class="sr-only">(current)</span></a>
            </button>

            <button type="button" class="btn btn-default btn-lg text-light">
              <a class="text-light" href="{{ url('/login') }}">Login <span class="sr-only">(current)</span></a>
            </button>

        </div>
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