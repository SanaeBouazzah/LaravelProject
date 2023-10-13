<div>
  <p>{{$ticket->title}}</p>
  <p>{{$ticket->description}}</p>
  @if ($ticket->attachments)
  <p>{{$ticket->attachments}}</p>
  @endif
</div>

<a href="{{route('ticket.create')}}">Go Back</a>
