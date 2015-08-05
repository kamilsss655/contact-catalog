@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="error-template text-center">
                <h2>Nie znaleziono!</h2>
                <p class="error-details">
                    Przepraszamy, wystąpił błąd (404).
                </p>
                <p class="error-details">
                    Nie znaleziono strony, której szukasz.
                </p>
                <div class="error-actions">
                    <a href="/" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Strona główna</a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop