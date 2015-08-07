@extends('layouts.master')

@section('content')

<div class="container-fluid padding-form">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 ">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <h3 class="panel-title">Edycja kontaktu</h3>
                </div>
                
                <div class="panel-body">
                    {{--Display contact picture if exists--}}
                    @if($contact->filename)
                    @include('partials.contact-image')
                    @endif
                    <p class="text-center profile-name text-capitalize">{{ $contact->first_name.' '.$contact->last_name }}</p>
                    <p class="text-center">{{ $contact->email }}</p>
                    <br>
                    {!! Form::open(array('route' => array('contact.update', $contact->id), 'method' => 'put', 'class' => 'contact padding-form', 'id' => 'editContactForm', 'enctype' => 'multipart/form-data')) !!}
                    <!--<form role="form" id="addContactForm" class="contact padding-form" method="update" action="/contact/{{$contact->id}}" enctype="multipart/form-data">-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon required"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" name="first_name" placeholder="Imię" type="text" value="{{$contact->first_name}}" required>   
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon required"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input class="form-control" name="email" value="{{$contact->email}}" placeholder="Adres email" type="email" required>   
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" name="last_name" value="{{$contact->last_name}}" placeholder="Nazwisko" type="text">   
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input class="form-control" name="phone" value="{{$contact->phone}}" placeholder="Telefon">   
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="form-control" name="street" value="{{$contact->street}}" placeholder="Ulica" type="text">   
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="form-control" name="house_number" value="{{$contact->house_number}}" placeholder="Numer domu" type="text"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="form-control" name="city" value="{{$contact->city}}" placeholder="Miasto" type="text">   
                                 
                            </div>
                        </div>
                     
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                {!! Form::select('county', $countiesArray, $contact->county, ['id' => 'CountySelector', 'class' => 'form-control']);!!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="form-control" name="zip_code" value="{{$contact->zip_code}}" class="form-control" data-mask="99-999" placeholder="Kod pocztowy" type="text">   
                            </div>
                        </div>
                        <hr>
                        {{-- Display edit and delete current photo controls --}}
                        @if($contact->filename)
                        <div class="form-group text-center">
                            <p><strong>Zmień aktualnie używane zdjęcie</strong></p>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail center-block" data-trigger="fileinput"></div>

                                <div>
                                    <p class="text-muted">Format: JPG, PNG, BMP, GIF Rozmiar: < 3MB </p>
                                    <p class="alert alert-danger image-input-errors" hidden="true"></p>
                                    <a href="#" class="btn btn-default fileinput-exists image-input-reset" data-dismiss="fileinput"><i class="glyphicon glyphicon-remove-sign"></i> Anuluj</a>
                                    <span class="btn btn-primary btn-file"><span class="fileinput-new"><i class="glyphicon glyphicon-camera"></i> Zmień zdjęcie</span><input type="file" class="image-input" value="" accept="image/*" name="image"></span>
                                    <hr>
                                </div>
                            </div>
                            <p><strong>Usuń aktualnie używane zdjęcie</strong></p>
                            <span class="button-checkbox">
                                <button type="button" class="btn" data-color="danger">Usuń zdjęcie</button>
                                <input type="checkbox" class="hidden" name="deleteOldPhoto" />
                            </span>
                        </div>
                        @else
                        <div class="form-group text-center">
                            <p><strong>Dodaj zdjęcie do kontaktu</strong></p>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail center-block" data-trigger="fileinput"></div>

                                <div>
                                    <p class="text-muted">Format: JPG, PNG, BMP, GIF Rozmiar: < 3MB </p>
                                    <p class="alert alert-danger image-input-errors" hidden="true"></p>
                                    <a href="#" class="btn btn-default fileinput-exists image-input-reset" data-dismiss="fileinput"><i class="glyphicon glyphicon-remove-sign"></i> Anuluj</a>
                                    <span class="btn btn-primary btn-file"><span class="fileinput-new"><i class="glyphicon glyphicon-camera"></i> Dodaj zdjęcie</span><input class="image-input" type="file" value="" accept="image/*" name="image"></span>
                                   
                                </div>
                            </div>
                        </div>
                            
                        @endif
                        
                        <hr>
                        <div class="form-group pull-right">
                            <a href="{{ URL::previous() }}" class="btn btn-default"><i class="glyphicon glyphicon-floppy-remove"></i> Anuluj</a>
                            <button class="btn btn-success contact-form-submit" type="submit"><i class="glyphicon glyphicon-plus"></i> Wykonaj</button>
                        </div>
               
                    <!--</form>-->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
