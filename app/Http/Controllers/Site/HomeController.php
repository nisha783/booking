<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    //
    public function  openHomePage(){
        $events = Event::with(['category'])->get();
        return view('site.index',compact('events'));
    }


    public function  openEventDetailsPage($id){
        $event = Event::findOrFail($id);
        return view('site.details',compact('event'));

    }

    public function openThankuPage()
    {
       
        return view('site.thanku');
    }

    public function openCancelPage()
    {
       
        return view('site.cancel');
    }
    
}
