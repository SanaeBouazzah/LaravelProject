<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    public function index()
    {
        //
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
          // 'attachment' => $request->attachment,
          'user_id' => auth()->id(),
        ]);
        return response($ticket);
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
