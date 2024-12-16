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
        return 'i am index page';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories= Category::all();
        return view('auth.events.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $category= Category::find($request->category);
        if(!$category){
          return back()->withErrors('unable to find category,please choose the correct');
        }
     try{
        dd($request->all());
        Event::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'category'=> $request->category,
            'type'=> $request->type,
            'price'=> $request->price,
            'location'=> $request->location,
            'start_time'=> $request->start_time,
            'end_time'=> $request->end_time,
            'max_attendence'=> $request->max_attendence,
           ]);

           session()->flash('success_msg','Event  saved successfully!');
           return redirect()->route('events.index');
     }
     catch(\Exception $ex){
        return back()->withErrors('something wenr wrong ', $ex->getmessage());
     }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
