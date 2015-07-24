@extends('layouts.master')

@section('content')


<div class="container-fluid padding-form">
    <div class="row">

        
        <div id="no-more-tables">
            <table class="col-md-10 col-md-offset-1 table-bordered table-striped table-condensed cf">
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
                @foreach ($contacts as $contact)
                <tr>
                    <td data-title="Zdjęcie">
                        <div class="frame-round">
                        <div class="crop">
                        <img class="contact-image" src="/img/placeholders/man.jpg">
                        </div>                   
                        </div>                   
                    </td>
                    <td data-title="Imię">{{ $contact->first_name }}</td>
                    <td data-title="Nazwisko">{{ $contact->last_name }}</td>
                    <td data-title="Email">{{ $contact->email }}</td>
                    <td data-title="Telefon">{{ $contact->phone }}</td>
                    <td data-title="Ulica">{{ $contact->street }}</td>
                    <td data-title="Nr mieszkania">{{ $contact->house_number }}</td>
                    <td data-title="Miasto">{{ $contact->city }}</td>
                    <td data-title="Kod pocztowy">{{ $contact->zip_code }}</td>
                    <td data-title="Województwo">{{ $contact->county_id }}</td>
                    <td data-title="Akcja" class="text-center">
                        <a class="btn btn-warning">Usuń</a>
                        <a class="btn btn-default">Edytuj</a>
                    </td>
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