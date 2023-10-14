@if (session('message'))
<div class="text-red-500">
    {{ session('message') }}
</div>
@endif

@foreach ($tickets as $ticket)
<fieldset style="width:50%; marign:0 auto;">
  <legend>Support Ticket</legend>
  <div>
    <h3>Title :</h3>
    <a href="{{route('tickets.show',$ticket->id)}}">{{$ticket->title}}</a>
  </div>
  <div>
    <h3>description :</h3>
    <p>{{$ticket->description}}</p>
  </div>
  @if ($ticket->attachments)
  <div>
    <h3>Attachment :</h3>
    <p>{{$ticket->attachments}}</p>
  </div>
  @endif
  <div><h3>Created at:</h3>
    <p>{{$ticket->created_at->diffForHumans()}}</p>
  </div>
</fieldset>
@endforeach

<a href="{{route('tickets.create')}}">Go Back</a>
