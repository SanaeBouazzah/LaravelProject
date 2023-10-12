<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    public function index()
    {
        return view('ticket.index');
    }
    public function create()
    {
      return view('ticket.create');
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
        return view('ticket.index')->with('message', 'you have created a ticket successfully!!!!!!!!!111');
    }
    public function show(Ticket $ticket)
    {
        //
    }
    public function edit(Ticket $ticket)
    {
        //
    }
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }
    public function destroy(Ticket $ticket)
    {
        //
    }
}
