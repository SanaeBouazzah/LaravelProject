<x-app-layout>
  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <fieldset style="width:50%; marign:0 auto;">
      <legend>Update Support Ticket</legend>
      <div>
        <label>Title</label>
        <input type="text" name="title" id="title" value="{{$ticket->title}}" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
      </div>
      <div>
        <label>description</label><br/>
        <x-textarea name="description" id="description"/>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
      </div>
      <div>
        <label>Attachment</label>
        <x-file-input name="attachments" id="attachments" value="{{$ticket->attachments}}"/>
        <x-input-error :messages="$errors->get('attachments')" class="mt-2" />
      </div>
      <button>create</button>
    </fieldset>
  </form>
</x-app-layout>