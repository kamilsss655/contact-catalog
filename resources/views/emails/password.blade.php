<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-4 col-md-offset-4 ">
				<h1>Witaj {{$user->first_name}}</h1>

                <h4>Otrzymaliśmy prośbę o zresetowanie Twojego hasła dla konta: <strong>{{$user->email}}</strong></h4>
                
                <p>Aby zresetować zapomniane hasło kliknij poniżej:</p>
                <p><a class="btn btn-primary" href="{{ url('password/reset/'.$token) }}">Zresetuj hasło</a></p>
                
                <p>Jeżeli nie chcesz zresetować swojego hasła to zignoruj tą wiadomość.</p>
                
                <hr>
                
                <p>Z poważaniem, </p>
                                
                <p>Zespół Contacto</p>
			</div>
		</div>
	</div>


</body>
</html> 