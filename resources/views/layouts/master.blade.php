<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/favicon.ico">

    <title>Contacto - Twoje kontakty zawsze i wszędzie</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">

    


  </head>

  <body>
    
    {{-- Show navigation --}} 
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        @if (Auth::check())   
          @include('partials/navigation-user')
          @else
          @include('partials/navigation-guest')
          @endif
        </div>
    </nav>
  
   {{-- Show controller status messages --}}  
    @if (session('status'))
    <div class="container-fluid padding-form text-center">
      <div class="alert alert-success">
         <p>{{ session('status') }} <i class="glyphicon glyphicon-ok"></i></p> 
      </div>
    </div>
    @endif
    
    {{-- Show controller warning messages --}}   
    @if (session('warning'))
    <div class="container-fluid padding-form text-center">
      <div class="alert alert-warning">
         <p>{{ session('warning') }} <i class="glyphicon glyphicon-remove-circle"></i></p> 
      </div>
    </div>
    @endif
    
    {{-- Show controller error messages --}}   
    @if (session('error'))
    <div class="container-fluid padding-form text-center">
      <div class="alert alert-danger">
         <p>{{ session('error') }} <i class="glyphicon glyphicon-exclamation-sign"></i></p> 
      </div>
    </div>
    @endif
    
    {{-- Show validation errors --}}
    @if (count($errors) > 0)
    <div class="container-fluid padding-form text-center">
      <div class="alert alert-danger">
          <p><i class="glyphicon glyphicon-alert"></i><strong> Wystąpił błąd!</strong></p>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    </div>
    @endif
    
     <!-- Show main content -->   
      @yield('content')
            
            
    <!-- Show add contact modal for logged in users -->       
    @if (Auth::check()) 
      @include('partials/contact-modal')
    @endif    
    
    <footer>
        <hr>
        &copy; 2015 Contacto by Kamil Cyrkler
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!--Custom functions-->
    <script src="/js/custom/functions.js"></script>
    <!--Jasny bootstrap for image upload styling and preview-->
    <script src="/js/jasny-bootstrap.min.js"></script>

  </body>
</html>