<x-app-layout>
  <form action="{{route('ticket.store')}}" method="POST" >
    @csrf
    <fieldset style="width:50%; marign:0 auto;">
      <legend>Create New Support Ticket</legend>
      <div>
        <label>Title</label>
        <input type="text">
      </div>
      <div>
        <label>description</label><br/>
        <x-textarea/>
      </div>
      <div>
        <label>Attachment</label>
        <x-file-input name="attachment" id="attachment"/>
      </div>
      <button>create</button>
    </fieldset>
  </form>
</x-app-layout>