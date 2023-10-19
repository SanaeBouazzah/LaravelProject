<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Notifications\TicketUpdatedNotification;

class TicketController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tickets = $user->isAdmin ? Ticket::latest()->get() : $user->tickets;
        return view('tickets.index', ['tickets' => $tickets]);
    }
    public function create()
    {
      return view('tickets.create');
    }
    public function store(StoreTicketRequest $request)
    {

        $ticket = Ticket::create([
          'title' => $request->title,
          'description' => $request->description,
          'attachments' => $request->attachments,
          'user_id' => auth()->id(),
        ]);
        // $path = $request->file('attachments')->store('attachments', 'public');
        // $ticket->update(['attachment' => $path]);
        if($request->hasFile('attachments')){
          $this->StoreAttachment($request, $ticket);
        }
        return view('tickets.index');
    }
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->except('attachments'));
        if ($request->has('status')) {
          // $user = User::find($ticket->user_id);
          $ticket->user->notify(new TicketUpdatedNotification($ticket));
          // return (new TicketUpdatedNotification($ticket))->toMail($user);
        }
        if($request->file('attachments')){
          Storage::disk('public')->delete($ticket->attachments);
          $this->StoreAttachment($request, $ticket);
        }
        return view('tickets.index')->with('message', 'you have updated ticket succeffully!!!');
    }
    public function destroy(Ticket $ticket)
    {
       $ticket->delete();
        return view('tickets.index')->with('message', 'you have deleted ticket succh');
    }
    protected function StoreAttachment($ticket,$request)
    {
      $file = $request->file('attachments');
      $contents = file_get_contents($request->file('attachments'));
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $stored = Str::random(25). '.' . $extension;
      $path = "attachments/$stored";
      Storage::disk('public')->put($path, $contents);
      $ticket->update(['attachments' => $path]);
    }
}
