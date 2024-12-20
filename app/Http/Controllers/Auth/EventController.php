<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Event\CreateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::all();
        return view('auth.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('auth.events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $category = Category::find($request->category_id);

        if (!$category) {
            return back()->withErrors('Unable to find category, please choose the correct one.');
        }

        try {
            Event::create([
                'name' => $request->name, // 'event' instead of 'name'
                'description' => $request->description,
                'type' => $request->type,
                'category_id' => $category->id, // 'category_id' instead of 'category'
                'location' => $request->location,
                'price' => $request->price,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'max_attendence' => $request->max_attendence,
            ]);

            session()->flash('success_msg', 'Event saved successfully!');
            return redirect()->route('events.index');
        } catch (\Exception $ex) {
            return back()->withInput()->withErrors('Something went wrong: ' . $ex->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */

    //
    public function show($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('auth.events.show', compact('event'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
