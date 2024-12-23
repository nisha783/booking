<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Event\CreateRequest;
use App\Http\Requests\Auth\Event\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use App\Models\Booking;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user=auth()->user();
        if($user->role == 'user'){
            $booking= Booking::where('user_id',$user->id)->where('status','paid')->pluck('event_id');
            $events=Event::whereIn('id', $booking)->get();
        }
        else{

            $events = Event::all();
        }
        return view('auth.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        auth()->user()->checkRoleOrAbort();
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
    public function edit(Event $event)
    {
        //
        auth()->user()->checkRoleOrAbort();
        $categories = Category::all();

        return view('auth.events.edit',compact('categories' ,'event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        auth()->user()->checkRoleOrAbort();
        $category = Category::find($request->category_id);
    
        if (!$category) {
            return back()->withErrors('Unable to find category, please choose the correct one.');
        }
    
        try {
            $event = Event::findOrFail($id); // Find the event or throw a 404 error
    
            $event->update([
                'name' => $request->name, // Replace 'event' with 'name'
                'description' => $request->description,
                'type' => $request->type,
                'category_id' => $category->id, // Replace 'category' with 'category_id'
                'location' => $request->location,
                'price' => $request->price,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'max_attendence' => $request->max_attendence,
            ]);
    
            session()->flash('success_msg', 'Event updated successfully!');
            return redirect()->route('events.index');
        } catch (\Exception $ex) {
            return back()->withInput()->withErrors('Something went wrong: ' . $ex->getMessage());
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        auth()->user()->checkRoleOrAbort();
        try {
            $event = Event::findOrFail($id); // Find the event by ID
            $event->delete(); // Delete the event from the database
    
            session()->flash('success_msg', 'Event deleted successfully!');
            return redirect()->route('events.index'); // Redirect to the events list
        } catch (\Exception $ex) {
            return back()->withErrors('Something went wrong: ' . $ex->getMessage());
        }
    }
}
