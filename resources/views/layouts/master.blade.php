<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Contacto - Twoje kontakty zawsze i wszędzie</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">


  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
       
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/#">Contacto</a>
        </div>

       
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/#">Kontakty <span class="sr-only">(current)</span></a></li>
            <li><a href="/#">Dodaj kontakt</a></li>
            <li class="dropdown">
              <a href="/#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Więcej <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/#">Mój profil</a></li>
                <li><a href="/#">Ustawienia</a></li>
                <li class="divider"></li>
                <li><a href="/#">Pomoc</a></li>
                <li class="divider"></li>
                <li><a href="/#">Wsparcie techniczne</a></li>
              </ul>
            </li>
          </ul>
          @if (Auth::check())
          <form id="logout" class="navbar-form navbar-right"  method="GET" action="{{ url('/auth/logout') }}" role="form">
            <span>{{ Auth::user()->email }}</span>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-danger">Wyloguj</button>
          </form>
          @else
          <form id="signin" class="navbar-form navbar-right" method="POST" action="{{ url('/auth/login') }}" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="email" type="email" class="form-control" name="email" value="" placeholder="Adres email">                                        
          </div>

          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control" name="password" value="" placeholder="Hasło">                                        
          </div>

          <button type="submit" class="btn btn-primary">Zaloguj</button>
          <a href="/auth/register" class="btn btn-default">Utwórz konto</a>
          </form>
          @endif
        </div>
      </div>
    </nav>
    
    <div>
            @yield('content')
    </div>
    
    <footer>
        <hr>
        &copy; 2015 Contacto by Kamil Cyrkler
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>