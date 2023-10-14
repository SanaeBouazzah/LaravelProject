<x-app-layout>
  <form action="{{route('tickets.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <fieldset style="width:50%; marign:0 auto;">
      <legend>Create New Support Ticket</legend>
      <div>
        <label>Title</label>
        <input type="text" name="title" id="title">
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
      </div>
      <div>
        <label>description</label><br/>
        <textarea name="description" id="description"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
      </div>
      <div>
        <label>Attachment</label>
        <x-file-input name="attachments" id="attachments"/>
        <x-input-error :messages="$errors->get('attachments')" class="mt-2" />
      </div>
      <button>create</button>
    </fieldset>
  </form>
</x-app-layout>