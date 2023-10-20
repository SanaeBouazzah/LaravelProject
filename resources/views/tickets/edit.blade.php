<x-app-layout>
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
      <h1 class="text-dark text-lg font-bold">Update new support ticket</h1>
      <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <form action="{{route('tickets.update', $ticket->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
            <div class="mt-4">
              <label>Title</label>
              <x-text-input type="text" name="title" id="title" value="{{$ticket->title}}" class="block mt-1 w-full" autofocus/>
              <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="mt-4">
              <label>Description</label><br/>
              <x-textarea name="description" id="description" value="{{$ticket->description}}"/>
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="mt-4">
              <label>Attachment</label>
              @if ($ticket->attachments)
                  <a href="{{'/storage/'.$ticket->attachments}}">Link</a>
              @endif
              <x-file-input name="attachments" id="attachments" value="{{$ticket->attachments}}"/>
              <x-input-error :messages="$errors->get('attachments')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-3">
                  Update
              </x-primary-button>
          </div>
        </form>
      </div>
  </div>
</x-app-layout>