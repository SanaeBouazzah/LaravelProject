<x-app-layout>
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
      <div class="flex justify-between w-full sm:max-w-xl">
          <h1 class="text-dark text-lg font-bold">Support Tickets</h1>
          <div>
              <a href="{{ route('tickets.create') }}" class="bg-dark rounded-lg p-2">Create New</a>
          </div>
      </div>
      <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-dark dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
          @forelse ($tickets as $ticket)
              <div class="text-dark flex justify-between py-4">
                  <a href="{{ route('tickets.show', $ticket->id) }}" class="text-decoration-underline">{{ $ticket->title }}</a>
                  <p>{{ $ticket->created_at->diffForHumans() }}</p>
              </div>
          @empty
              <p class="text-dark">You don't have any support ticket yet.</p>
          @endforelse
      </div>
  </div>
</x-app-layout>