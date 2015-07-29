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
                      <form role="form" id="addContactForm" class="contact" method="post" action="/contact" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon required"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" name="first_name" placeholder="Imię" type="text" value="{{old('first_name')}}" required>   
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon required"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input class="form-control" name="email" value="{{old('email')}}" placeholder="Adres email" type="email" required>   
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" name="last_name" value="{{old('last_name')}}" placeholder="Nazwisko" type="text">   
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input class="form-control" name="phone" value="{{old('phone')}}" placeholder="Telefon">   
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="form-control" name="street" value="{{old('street')}}" placeholder="Ulica" type="text">   
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="form-control" name="house_number" value="{{old('house_number')}}" placeholder="Numer domu" type="text"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="form-control" name="city" value="{{old('city')}}" placeholder="Miasto" type="text">   
                                 
                            </div>
                        </div>
                     
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                {!! Form::select('county', $countiesArray, old('county'), ['id' => 'CountySelector', 'class' => 'form-control']);!!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <input class="form-control" name="zip_code" value="{{old('zip_code')}}" class="form-control" data-mask="99-999" placeholder="Kod pocztowy" type="text">   
                            </div>
                        </div>
                        <hr>

                        <div class="form-group text-center">
                            <p><strong>Dodaj zdjęcie do kontaktu</strong></p>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail center-block" data-trigger="fileinput"></div>

                                <div>
                                    <p class="text-muted">Format: JPG, PNG, BMP, GIF Rozmiar: < 3MB </p>
                                    <p id="fileUploadErrors" class="alert alert-danger" hidden="true"></p>
                                    <a href="#" id="imageUploadReset" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-remove-sign"></i> Anuluj</a>
                                    <span class="btn btn-primary btn-file"><span class="fileinput-new"><i class="glyphicon glyphicon-camera"></i> Dodaj zdjęcie</span><input type="file" value="" accept="image/*" name="image" id="imageToUpload"></span>
                                   
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group pull-right">
                            <a href="{{ URL::previous() }}" class="btn btn-default"><i class="glyphicon glyphicon-floppy-remove"></i> Anuluj</a>
                            <button class="btn btn-success" type="submit" disabled="false" id="submitContact"><i class="glyphicon glyphicon-plus"></i> Wykonaj</button>
                        </div>
               
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@stop
