@extends('layouts.site')

@section('content')
<!-- Header Section -->

@section('header')
<div class="header-section">
    <h1>Explore Our Exclusive Events</h1>
    <p>Discover, book, and enjoy the best events tailored just for you. Don’t miss out on the fun!</p>

    {{-- @auth

    @else

    @endauth --}}

    <div class="mt-5">
        @if(auth()->check())
            <a href="{{ route('dashboard') }}" class="btn btn-success">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        @endif
    </div>

</div>
@endsection

<!-- Events Section -->
<div class="container my-5">
    <div class="events-section">
        <div class="row g-4">
            <!-- Event Card Template - Repeat for Each Event -->

         


            <!-- Additional Event Cards here -->

            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Event Name
                    </div>
                    <div class="card-body">
                        <!-- <h5 class="event-title">Paid Event</h5> -->
                        <p class="card-text"><strong>Location:</strong> Event Location</p>
                        <p class="card-text"><strong>Category:</strong> Category Name</p>
                        <p class="card-text"><strong>Start Date:</strong> 01/01/2024</p>
                        <p class="card-text"><strong>End Date:</strong> 01/02/2024</p>
                        <p class="card-text"><strong>Max Attendees:</strong> 20</p>
                        <p class="price">$0</p>
                        <button class="btn w-100" style="background-color: #1e8d52; color:white" onclick="alert('Booking successful!')">Book Now</button>
                    </div>
                </div>
            </div> --}}

        </div>

    </div>
</div>
@endsection

