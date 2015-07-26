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
            <li><a href="/#">Informacje</a></li>
            <li><a href="/#">Poradnik</a></li>
            <li class="dropdown">
              <a href="/#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Więcej <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/#">Pomoc</a></li>
                <li><a href="/#">Wsparcie techniczne</a></li>
                <li class="divider"></li>
                <li><a href="/#">Skontaktuj się z nami</a></li>
              </ul>
            </li>
          </ul>
          <form id="signin" class="navbar-form navbar-right" method="POST" action="{{ url('/auth/login') }}" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="email" type="email" class="form-control" name="email" value="" placeholder="Adres email" required>                                        
          </div>

          <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control" name="password" value="" placeholder="Hasło" required>                                        
          </div>
          <div class="input-group">
            <a href="/auth/register" class="btn btn-default">Utwórz konto</a>
            <button type="submit" class="btn btn-primary btn-login">Zaloguj</button>
          </div>
          </form>
          </div>