@extends('layouts.master')

<div class="container-fluid padding-form">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		    
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Dane użytkownika: <strong>{{ Auth::user()->email }}</strong></div>

  <!-- Table -->
  <table class="table">
    <tr>
        <td>Imię</td>
        <td>{{ Auth::user()->first_name }}</td>
    </tr>
    <tr>
        <td>Nazwisko</td>
        <td>{{ Auth::user()->last_name }}</td>
    </tr> 
    <tr>
        <td>Adres email</td>
        <td>{{ Auth::user()->email }}</td>
    </tr>
  </table>
</div>

</div>
</div>
</div>