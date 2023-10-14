<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Database\Eloquent\Model;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
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
          $file = $request->file('attachments');
          $contents = file_get_contents($request->file('attachments'));
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $stored = Str::random(25). '.' . $extension;
          $path = "attachments/$filename";
          Storage::disk('public')->put($path, $contents);
          $ticket->update(['attachments' => $path]);
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
        $ticket->update($request->validated());
        return view('tickets.show')->with('message', 'you have updated ticket succeffully!!!');
    }
    public function destroy(Ticket $ticket)
    {
       $ticket->delete();
        return view('tickets.index')->with('message', 'you have deleted ticket succh');
    }
}
