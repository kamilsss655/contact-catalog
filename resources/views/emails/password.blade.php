<h1>Witaj {{$user->first_name}}</h1>

<h2>Otrzymaliśmy prośbę o zresetowanie Twojego hasła dla konta: {{$user->email}}</h2>

<p>Aby zresetować zapomniane hasło kliknij poniżej:</p>
<a href="{{ url('password/reset/'.$token) }}">Zresetuj hasło</a>

<p>Jeżeli to nie chcesz zresetować swojego hasła to zignoruj tą wiadomość.</p>

<p>Z poważaniem, Zespół Contacto</p>