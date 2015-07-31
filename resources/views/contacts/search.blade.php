@extends('layouts.master')

@section('content')


{{-- Show controller warning messages --}}   
@if(sizeof($results) == 0)
<div class="container-fluid padding-form text-center">
  <div class="alert alert-danger">
     <p>Nie znaleziono kontaktów o podanych kryteriach. <i class="glyphicon glyphicon-exclamation-sign"></i></p> 
  </div>
</div>
@else
<div class="container-fluid padding-form text-center">
  <div class="alert alert-success">
     <p>Znaleziono kontakty o podanych kryteriach. <i class="glyphicon glyphicon-ok"></i></p> 
  </div>
</div>
@endif


<div class="container-fluid padding-form">
    <div class="row">

        
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
        			    <th>Zdjęcie</th>
        				<th>Imię</th>
        				<th>Nazwisko</th>
        				<th>Email</th>
        				<th>Telefon</th>
        				<th>Ulica</th>
        				<th>Nr mieszkania</th>
        				<th>Miasto</th>
        				<th>Kod pocztowy</th>
        				<th>Województwo</th>
        				<th>Akcja</th>
        			</tr>
        		</thead>
        		<tbody>
                @foreach ($results as $contact)
                <tr>
                    <td data-title="Zdjęcie">
            
                        @include('partials.contact-image')

                    </td>
                    <td data-title="Imię">{{ $contact->first_name}}</td>
                    <td data-title="Nazwisko">{{ $contact->last_name }}</td>
                    <td data-title="Email">{{ $contact->email }}</td>
                    <td data-title="Telefon">{{ $contact->phone }}</td>
                    <td data-title="Ulica">{{ $contact->street }}</td>
                    <td data-title="Nr mieszkania">{{ $contact->house_number }}</td>
                    <td data-title="Miasto">{{ $contact->city }}</td>
                    <td data-title="Kod pocztowy">{{ $contact->zip_code }}</td>
                    <td data-title="Województwo">{{ $contact->county }}</td>
                    <td data-title="Akcja" class="text-center">
                        
                        {!! Form::open(array('route' => array('contact.destroy', $contact->id), 'method' => 'delete', 'class' => 'action-btn')) !!}
                            <button type="submit" class="btn btn-danger btn-mini" alt="Usuń"><i class="glyphicon glyphicon-remove"></i> Usuń</button>
                        {!! Form::close() !!}
                        <a href="{{ URL::to('contact/'.$contact->id.'/edit') }}" class="btn btn-mini btn-warning action-btn" alt="Edytuj"><i class="glyphicon glyphicon-pencil"></i> Edycja</a>
                        <a href="{{ URL::to('contact/' . $contact->id) }}" class="btn btn-mini btn-primary action-btn" alt="Pokaż"><i class="glyphicon glyphicon-envelope"></i> Napisz</a>
                        <a href="{{ URL::to('contact/' . $contact->id) }}" class="btn btn-mini btn-default action-btn" alt="Pokaż"><i class="glyphicon glyphicon-user"></i> Pokaż</a>
                    </td>
                </tr>
                @endforeach
          		</tbody>
        	</table>
        </div>
    
        <div class="col-md-10 col-md-offset-1 text-center">
            {!! $results->appends(['q' => Input::get('q')])->render() !!}                 
        </div>

    </div>
</div>
    





@stop