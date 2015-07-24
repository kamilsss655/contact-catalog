@extends('layouts.master')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="text-center">
                Kontakty. {{$contactCount}} 
    
            </h1>
        </div>
        

            
        <div id="no-more-tables">
            <table class="col-md-10 col-md-offset-1 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th>Imię</th>
        				<th>Nazwisko</th>
        				<th>Email</th>
        				<th>Telefon</th>
        				<th>Ulica</th>
        				<th>Nr mieszkania</th>
        				<th>Miasto</th>
        				<th>Kod pocztowy</th>
        				<th>Województwo</th>
        			</tr>
        		</thead>
        		<tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td data-title="Imię">{{ $contact->first_name }}</td>
                    <td data-title="Nazwisko">{{ $contact->last_name }}</td>
                    <td data-title="Email">{{ $contact->email }}</td>
                    <td data-title="Telefon">{{ $contact->phone }}</td>
                    <td data-title="Ulica">{{ $contact->street }}</td>
                    <td data-title="Nr mieszkania">{{ $contact->house_number }}</td>
                    <td data-title="Miasto">{{ $contact->city }}</td>
                    <td data-title="Kod pocztowy">{{ $contact->zip_code }}</td>
                    <td data-title="Województwo">{{ $contact->county_id }}</td>
                </tr>
                @endforeach
          		</tbody>
        	</table>
        </div>
        
        
        
        <div class="col-md-10 col-md-offset-1 text-center">
            {!! $contacts->render() !!}                 
        </div>
    </div>
</div>
    





@stop