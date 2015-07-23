@extends('layouts.master')

@section('content')

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
                <div class="col-md-4 col-fixed-height">
                  <img src="img/1.png" class="img-responsive img-features center-block">
                  <h2 class="text-center features-header">Dostępność</h2>
                  <p class="text-justify">W erze cyfrowej dostęp do Internetu jest zdecydowanie ważny. Jednak wiele obszarów w Polsce nadal nie ma dostępu do naziemnej infrastruktury pozwalającej na podłączenie do Internetu. Dostępność Internetu stacjonarnego w Polsce jest ograniczona. Naziemne łącza internetowe nie wszędzie są obecne. </p>
                  <p><a class="btn btn-default btn-features center-block" href="#" role="button">Dowiedz się więcej &raquo;</a></p>
                </div>
                <div class="col-md-4 col-fixed-height">
                  <img src="img/2.png" class="img-responsive img-features center-block">
                  <h2 class="text-center features-header">Bezpieczeństwo</h2>
                  <p class="text-justify">Naszym celem jest skuteczna ochrona Twoich danych osobowych, środków pieniężnych oraz zapewnienie bezpieczeństwa transakcji przeprowadzanych w serwisie. W tym celu wdrożyliśmy złożone systemy ochronne i monitorujące, których głównym zadaniem jest ochrona naszego serwisu przed wrogim atakiem z zewnątrz.</p>
                  <p><a class="btn btn-default btn-features center-block" href="#" role="button">Dowiedz się więcej &raquo;</a></p>
                </div>
                <div class="col-md-4 col-fixed-height">
                  <img src="img/3.png" class="img-responsive img-features center-block">
                  <h2 class="text-center features-header">Wsparcie techniczne</h2>
                  <p class="text-justify">Skoncentruj się na swoim biznesie, a kwestie techniczne powierz nam - to najkrótsza i najlepsza definicja opisująca świadczoną przez nas, szeroko pojętą usługę utrzymania systemów i zarządzania infrastrukturą IT. Pozwól odciążyć się od natłoku technicznych, około-biznesowych prac, zyskaj spokój i profesjonalne wsparcie w dziedzinie IT. </p>
                  <p><a class="btn btn-default btn-features center-block" href="#" role="button">Dowiedz się więcej &raquo;</a></p>
                </div>
            </div>
        </div>
    </section>

@stop