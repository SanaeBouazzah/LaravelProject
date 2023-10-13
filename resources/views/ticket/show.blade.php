<fieldset style="width:50%; marign:0 auto;">
  <legend><h4>Ticket :has created at: {{$ticket->created_at}}</h4></legend>
  <div>
    <p>{{$ticket->title}}</p>
    <p>{{$ticket->description}}</p>
    @if ($ticket->attachments)
    <p>{{$ticket->attachments}}</p>
    @endif
  </div>
</fieldset>

<a href="{{route('ticket.create')}}">Go Back</a>
