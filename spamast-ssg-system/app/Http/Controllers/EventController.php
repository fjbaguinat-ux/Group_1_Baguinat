<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private function rules()
    {
        return [
            'name'        => 'required|string|max:255',
            'event_date'  => 'required|date',
            'venue'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ];
    }

    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        Event::create($request->validate($this->rules()));
        return redirect()->route('events.index')->with('success', 'Event created.');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $event->update($request->validate($this->rules()));
        return redirect()->route('events.index')->with('success', 'Event updated.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted.');
    }
}
