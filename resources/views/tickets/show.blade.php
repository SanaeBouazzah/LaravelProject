@if (session('message'))
    <p style="color:red;">{{session('message')}}</p>
@endif
<fieldset style="width:50%; marign:0 auto;">
  <legend><h4>Ticket :has created at: {{$ticket->created_at}}</h4></legend>
  <div>
    <p>{{$ticket->title}}</p>
    <p>{{$ticket->description}}</p>
    @if ($ticket->attachments)
    <a href="{{'/storage/'.$ticket->attachments}}" target="_blank">attachment</a>
    @endif
  </div>
  <br/>
  <a href="{{route('tickets.edit', $ticket)}}">Edit</a>
  <form action="{{route('tickets.destroy', $ticket->id)}}" method="POST">
    @csrf
    @method('delete')
    <button>Delete</button>
  </form>
</fieldset>

<a href="{{route('tickets.create')}}">Go Back</a>
