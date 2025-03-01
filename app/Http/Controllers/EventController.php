<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
{
    $query = Event::query();

    if (request()->has("search") && request()->has("filter") && request("filter") != '') {
        $search = request("search");
        $filter = request("filter");

        $query->where($filter, "like", "%" . $search . "%");
    }

    if (request()->has("start_date") && request("start_date") != '') {
        $query->where('start_at', '>=', request("start_date"));
    }

    if (request()->has("end_date") && request("end_date") != '') {
        $endDate = new \DateTime(request("end_date"));
        $endDate->setTime(23, 59, 59); // Ajusta a hora para o final do dia
        $query->where('start_at', '<=', $endDate->format('Y-m-d H:i:s'));
    }

    if (request()->has("price_from") && request("price_from") != '') {
        $query->where('price', '>=', request("price_from"));
    }

    if (request()->has("price_to") && request("price_to") != '') {
        $query->where('price', '<=', request("price_to"));
    }

    $events = $query->orderBy('id', 'asc')->paginate(3);

    return view('events.index', ['events' => $events]);
}


    public function create()
    {
        $eventTypes = [
            'social',
            'cultural',
            'esportivo',
            'corporativo',
            'religioso',
            'entretenimento',
            'outros'
        ];
        return view('events.create', compact('eventTypes'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'type' => 'required|in:social,cultural,esportivo,corporativo,religioso,entretenimento,outros',
        'name' => 'required',
        'start_at' => 'required',
        'description' => 'nullable',
        'address' => 'required',
        'link_address' => 'required',
        'price' => 'required|decimal:0,2',
    ]);

    // Verificar se já existe um evento com o mesmo nome, data e hora
    $existingEvent = Event::where('name', $data['name'])
        ->where('start_at', $data['start_at'])
        ->first();

    if ($existingEvent) {
        session()->flash('errors','Event with the same name and start date/time already exists.');
        return redirect()->route('event.create');
    }

    $newEvent = Event::create($data);

    session()->flash('success', 'Event created successfully! Event ID: ' . $newEvent->id);
    return redirect()->route('event.index');
}

    public function edit(Event $event)
    {
        $eventTypes = [
            'social',
            'cultural',
            'esportivo',
            'corporativo',
            'religioso',
            'entretenimento',
            'outros'
        ];
        return view('events.edit', compact('event', 'eventTypes'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'type' => 'required|in:social,cultural,esportivo,corporativo,religioso,entretenimento,outros',
            'name' => 'required',
            'start_at' => 'required',
            'description' => 'nullable',
            'address' => 'required',
            'link_address' => 'required',
            'price' => 'required|decimal:0,2',
        ]);

        $event->update($data);

        session()->flash('update', 'Event updated successfully! Event ID: ' . $event->id);
        return redirect()->route('event.index');
    }
    public function destroy(Event $event)
    {
        $event->delete();
        session()->flash('destroy', 'Event deleted successfully! Event ID was: ' . $event->id);
        return redirect()->route('event.index');
    }
}
