@foreach ($tickets as $ticket)
<fieldset style="width:50%; marign:0 auto;">
  <legend>Support Ticket</legend>
  <div>
    <h3>Title :</h3>
    <p>{{$ticket->title}}</p>
  </div>
  <div>
    <h3>description :</h3>
    <p>{{$ticket->description}}</p>
  </div>
  <div>
    <h3>Attachment :</h3>
    <p>{{$ticket->attachments}}</p>
  </div>
  <div><h3>Created at:</h3>
    <p>{{$ticket->created_at->diffForHumans()}}</p>
  </div>
</fieldset>
@endforeach

<a href="{{route('ticket.create')}}">Go Back</a>
