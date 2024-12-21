<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function  openHomePage(){
        return view('site.index');


    }


    public function  openEventDetailsPage(){
        return view('site.details');

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
