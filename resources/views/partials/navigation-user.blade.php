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
            <li><a id="btnActivateModal" data-direction='top' href="javascript:;" onclick="jquery_stuff">Dodaj kontakt</a></li>
            <li role="presentation" class="active"><a href="/contact">Kontakty <span class="badge">{{ Session::get('contactCount') }}</span></a></li>
            <li class="dropdown">
              <a href="/#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Więcej <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/user">Mój profil</a></li>
                <li><a href="/#">Ustawienia</a></li>
                <li class="divider"></li>
                <li><a href="/#">Pomoc</a></li>
                <li class="divider"></li>
                <li><a href="/#">Wsparcie techniczne</a></li>
              </ul>
            </li>
          </ul>
          <form id="logout" class="navbar-form navbar-right"  method="GET" action="{{ url('/auth/logout') }}" role="form">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <span class="nav-username"><a href="/user">{{ Auth::user()->email }}</a></span>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-danger">Wyloguj</button>
          </form>
          </div>