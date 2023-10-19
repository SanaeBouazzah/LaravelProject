<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            User Avatar :
        </h2>

      <div class="flex justify-between h-16">
        <div>
          <img src="{{"storage/$user->avatar"}}" alt="user avatar" width="100px" height="100px">
         </div>
  
  
         <form action="{{route('profile.avatar.ai')}}" method="post">
          @csrf
           <x-primary-button>Generate Avatar</x-primary-button>
           <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Generate Avatar from AI
          </p>
          </form>
      </div>


        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
          Or
        </p>

    </header>

    @if (session('message'))
    <div class="text-red-500">
        {{ session('message') }}
    </div>
  @endif

    <form method="post" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mt-5">
            <x-input-label for="avatar" :value="__('Upload Avatar from your device')" class="mt-2"/>
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
