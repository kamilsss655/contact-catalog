@extends('layouts.master')

@section('content')

<div class="container-fluid padding-form">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 ">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <h3 class="panel-title">Dane kontaktu</h3>
                </div>
                
                <div class="panel-body">
                
                    @include('partials.contact-image')
                      
                    <p class="text-center profile-name text-capitalize">{{ $contact->first_name.' '.$contact->last_name }}</p>
                    <p class="text-center">{{ $contact->email }}</p>
                    <br>
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Telefon:</td>
                                <td>{{$contact->phone}}</td>
                            </tr>
                            <tr>
                                <td>Adres:</td>
                                <td>
                                    <p>{{$contact->street. ' '.$contact->house_number}}</p>
                                    <p>{{$contact->city. ' '.$contact->zip_code}}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <div class="container-fluid">
                
                        {!! Form::open(array('route' => array('contact.destroy', $contact->id), 'method' => 'delete', 'class' => 'action-btn-profile')) !!}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-mini"><i class="glyphicon glyphicon-remove"></i> Usuń</button>
                                <span class="pull-right">
                        <a href="{{ URL::previous() }}" class="btn btn-mini btn-default action-btn-profile"><i class="glyphicon glyphicon-floppy-remove"></i> Wróć</a>
                        <a href="{{ URL::to('contact/'.$contact->id).'/edit'}}" class="btn btn-mini btn-primary action-btn-profile"><i class="glyphicon glyphicon-pencil"></i> Edytuj</a>
                        </span>
                            </div>
                        {!! Form::close() !!}
                
                        
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
    
 
    
@stop
