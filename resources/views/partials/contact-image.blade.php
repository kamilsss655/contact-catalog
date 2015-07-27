{{--Show contact image, if it doesnt exist show placeholder image--}}
@if(is_null($contact->filename))
   { <img class="contact-image" src="/img/placeholders/placeholder-person.png"> }
@else
   { <img class="contact-image" src="/storage/contact-images/{{$contact->filename}}"> }
@endif