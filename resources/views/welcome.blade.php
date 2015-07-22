<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Contacto - Twoje kontakty zawsze i wszędzie</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">


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
          <a class="navbar-brand" href="#">Contacto</a>
        </div>

       
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Kontakty <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Dodaj kontakt</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Więcej <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Mój profil</a></li>
                <li><a href="#">Ustawienia</a></li>
                <li class="divider"></li>
                <li><a href="#">Pomoc</a></li>
                <li class="divider"></li>
                <li><a href="#">Wsparcie techniczne</a></li>
              </ul>
            </li>
          </ul>
          <form id="signin" class="navbar-form navbar-right" role="form">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="email" type="email" class="form-control" name="email" value="" placeholder="Adres email">                                        
            </div>

            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" value="" placeholder="Hasło">                                        
            </div>

            <button type="submit" class="btn btn-primary">Zaloguj</button>
            <a href="#register" class="btn btn-default">Utwórz konto</a>
            </form>
        </div>
      </div>
    </nav>

    
    <header class="jumbotron row vertical-center">
      <div class="col-md-4 col-md-offset-2">
        <img src="img/logo.png" class="img-responsive center-block img-logo">
      </div>
      <div class="col-md-4 col-md-offset-2 col-md-pull-2">
          <h1 class="header-brand">Contacto</h1>
          <h2>Twoje kontakty zawsze i wszędzie</h2>
          <p>W erze cyfrowej dostęp do Internetu jest zdecydowanie ważny. Jednak wiele obszarów w Polsce nadal nie ma dostępu do naziemnej infrastruktury pozwalającej na podłączenie do Internetu. Dostępność Internetu stacjonarnego w Polsce jest ograniczona. Naziemne łącza internetowe nie wszędzie są obecne. 
          </p>
          <a href="#getStarted" class="btn btn-primary">Rozpocznij teraz</a>
          <a href="#getStarted" class="btn btn-default">Dowiedz się więcej</a>
      </div>
    </header>

    <section>
         <div class="container">
         <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                  <img src="img/1.png" class="img-responsive img-features center-block">
                  <h2 class="text-center">Dostępność</h2>
                  <p class="text-justify">W erze cyfrowej dostęp do Internetu jest zdecydowanie ważny. Jednak wiele obszarów w Polsce nadal nie ma dostępu do naziemnej infrastruktury pozwalającej na podłączenie do Internetu. Dostępność Internetu stacjonarnego w Polsce jest ograniczona. Naziemne łącza internetowe nie wszędzie są obecne. </p>
                  <p><a class="btn btn-default center-block" href="#" role="button">Dowiedz się więcej &raquo;</a></p>
                </div>
                <div class="col-md-4">
                  <img src="img/2.png" class="img-responsive img-features center-block">
                  <h2 class="text-center">Bezpieczeństwo</h2>
                  <p class="text-justify">Naszym celem jest skuteczna ochrona Twoich danych osobowych, środków pieniężnych oraz zapewnienie bezpieczeństwa transakcji przeprowadzanych w serwisie. W tym celu wdrożyliśmy złożone systemy ochronne i monitorujące, których głównym zadaniem jest ochrona naszego serwisu przed wrogim atakiem z zewnątrz.</p>
                  <p><a class="btn btn-default center-block" href="#" role="button">Dowiedz się więcej &raquo;</a></p>
                </div>
                <div class="col-md-4">
                  <img src="img/3.png" class="img-responsive img-features center-block">
                  <h2 class="text-center">Wsparcie techniczne</h2>
                  <p class="text-justify">Skoncentruj się na swoim biznesie, a kwestie techniczne powierz nam - to najkrótsza i najlepsza definicja opisująca świadczoną przez nas, szeroko pojętą usługę utrzymania systemów i zarządzania infrastrukturą IT. Pozwól odciążyć się od natłoku technicznych, około-biznesowych prac, zyskaj spokój i profesjonalne wsparcie w dziedzinie IT. </p>
                  <p><a class="btn btn-default center-block" href="#" role="button">Dowiedz się więcej &raquo;</a></p>
                </div>
            </div>
        </div>
    </section>

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
