@extends('layouts.auth')
@section('title')
    Event Details
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
@endsection
@section('content')
    <a href="" class="mb-5">Events</a>
    <div class="conatiner">
        @if (session('success_msg'))
            <div class="alert alert-success" role="alert">
                <strong>Good Job!</strong>
                {{ session()->get('success_msg') }}
            </div>
        @endif
        @if (session('error_msg'))
            <div class="alert alert-danger" role="alert">
                <strong>Error!</strong>
                {{ session()->get('error_msg') }}
            </div>
        @endif
    </div>
               @if (auth()->user()->role == 'admin')
                <a href="{{ route('events.create') }}" class="btn btn-info">New Event</a>
            @endif
    <div class="col-lg-12 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Event </h4>
                <a href="{{ route('events.index') }} " class="p-3 btn btn-primary btn-md mt-3 mb-3 p-2">Go Back</a>
                <div class="table-responsive">
                    @if (count($events) > 0)
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Location</th>
                                    <th>Max_Attendence</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ number_format($event->price, 2) }}</td>
                                        <td>{{ $event->location }}</td>
                                        <td>{{ $event->max_attendence }}</td>
                                        <td>
                                            @if ($event->type == 'free')
                                                <span class="badge badge-primary">{{ $event->type }}</span>
                                            @elseif ($event->type == 'paid')
                                                <span class="badge badge-success">{{ $event->type }}</span>
                                            @else
                                                <span class="badge badge-info">{{ $event->type }}</span>
                                            @endif
                                        </td>
                                        <td class="d-flex ms-3">
                                            <a href="{{ route('events.show', ['event' => $event->id]) }}"
                                                class="btn btn-primary">Show</a>&nbsp;
                                            <a href="{{ route('events.edit', ['event' => $event->id]) }}"
                                                class="btn btn-success">Edit</a>&nbsp;
                                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this event?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-danger text-center">No Found Events</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
