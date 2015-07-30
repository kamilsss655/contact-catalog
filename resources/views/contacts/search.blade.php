@extends('layouts.master')

@section('content')


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
                            <button type="submit" class="btn btn-danger btn-mini">Usuń</button>
                        {!! Form::close() !!}
                        <a href="{{ URL::to('contact/'.$contact->id.'/edit') }}" class="btn btn-mini btn-primary action-btn">Edytuj</a>
                        <a href="{{ URL::to('contact/' . $contact->id) }}" class="btn btn-mini btn-default action-btn">Pokaż</a>
                    </td>
                </tr>
                @endforeach
          		</tbody>
        	</table>
        </div>
    
    
        
    </div>
</div>
    





@stop