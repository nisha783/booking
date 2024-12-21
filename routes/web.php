<?php

use App\Http\Controllers\Auth\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('auth')->middleware(['auth', 'verified'])->group(function(){

    Route::get('/dashboard', function (){
        return view('auth.dashboard');
    })->name('dashboard');
    Route::resource('events', EventController::class);
});
Route::get('/',[HomeCOntroller::class,'openHomePage'])->name('site.home');
Route::get('event/{id}',[HomeCOntroller::class,'openEventDetailsPage'])->name('site.details');

Route::get('thanku', [HomeCOntroller ::class,'openThankuPage'])->name('thanku');
Route::get('cancel', [HomeCOntroller ::class,'openCancelPage'])->name('cancel');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
