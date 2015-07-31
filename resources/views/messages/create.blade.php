@extends('layouts.master')

@section('content')

<div class="container-fluid padding-form">
	<div class="row">
	    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
            <div class="panel panel-default ">
                
                <div class="panel-heading">
                    <h3 class="panel-title">Wyślij wiadomość</h3>
                </div>
                
                <div class="panel-body">
                    
                    @include('partials.contact-image')
                      
                    <p class="text-center profile-name text-capitalize">{{ $contact->first_name.' '.$contact->last_name }}</p>
                    <p class="text-center">{{ $contact->email }}</p>
                    <br>
                    {!! Form::open(array('route' => array('message.send'), 'method' => 'post', 'class' => 'form-msg', 'id' => 'MessageForm')) !!}
                        {!! Form::hidden('contactId', $contact->id) !!}
                  		<div class="form-group">
                            <textarea class="form-control textarea-msg" rows="3" name="message" id="ContactMessage" maxlength="800" placeholder="Treść wiadomości" required></textarea>
                      	</div>
                      	
                      
                  	
                    
                    	<div class="panel-footer">
                            <div class="pull-right">
                                <a href="{{ URL::previous() }}" class="btn btn-default"><i class="glyphicon glyphicon-trash"></i> Anuluj</a>
                                <button class="btn btn-primary" type="submit" disabled="false" id="submitContact"><i class="glyphicon glyphicon-envelope"></i> Wyślij</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@stop