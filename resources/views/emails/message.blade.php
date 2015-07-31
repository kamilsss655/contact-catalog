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
				<h1>Hej {{$data['contactFirstName']}} !</h1>

				<p>Użytkownik <i class="glyphicon glyphicon-user"></i> {{$data['userFirstName']}} {{$data['userLastName']}} ({{$data['userEmail']}}) wysłał właśnie do Ciebie prywatną wiadomość korzystając z naszej aplikacji Contacto.</p>

				<div class="panel panel-default">
					<div class="panel-heading">
						Treść wiadomości
					</div>
					<div class="panel-body">
						{{$data['message']}}
					</div>
				</div>


				<p>Prosimy nie odpowiadać na tę wiadomość.</p>

				<p>Informujemy również, iż Zespół Contacto nie odpowiada za treść wysłanych wiadomości. Są one tworzone przez użytkowników, a Zespół Contacto nie ma wpływu ani wglądu co do ich treści.</p>

				<p>Jeżeli nie chcesz otrzymywać od nas wiadomości tego typu w przyszłości kliknij poniżej: </p>
				<p><a href="#" class="btn btn-default center-block">Nie chcę otrzymywać wiadomości tego typu</a></p>

				<hr>

				<p>Z poważaniem,</p>

				<p>Zespół Contacto</p> 
			</div>
		</div>
	</div>


</body>
</html> 