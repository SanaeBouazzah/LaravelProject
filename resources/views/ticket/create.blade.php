<x-app-layout>
  <form action="{{route('ticket.store')}}" method="POST">
    @csrf
    <button>save</button>
  </form>
</x-app-layout>