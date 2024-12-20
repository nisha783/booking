
@extends('layouts.auth')
@section('title')
Event Details
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <style>

        #event-table th{
           width: 40px; 
        }
        </style>
@endsection
@section('content')
<div class="d-flex">
    <a href="{{ route('events.index') }} " class="p-3 btn btn-primary btn-md mt-3 mb-3 p-2">Go Back</a>
    <a href="{{ route('events.show', ['event' => $event->id]) }}"   class="p-3 mt-3">Show</a>
    <a href="{{ route('events.index') }}"   class="p-3 mt-3 justify-content-end">Events</a>
</div>
<div class="col-lg-12 grid-margin stretch-card mt-3">
    <div class="card">
        <div class="card-body">
                <h4 class="card-title">Event </h4>
               <div class="table-responsive">
                @if ($event)
                <table id="event-table" class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{ $event->name }}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{ $event->type }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $event->location }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $event->category  ? $event->category->name : ''}}</td>
                        </tr>
                        @if ($event->type != 'free')  
                        <tr>
                            <th>Price</th>
                            <td>{{ $event->price  ? $event->price : 0 }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Start_Date</th>
                            <td>   {{ date('D d/m/Y' ,strtotime( $event->start_time)) }}</td>
                        </tr>
                        <tr>
                            <th>Ebd_Date</th>
                            <td>   {{ date('D d/m/Y' ,strtotime( $event->end_time)) }}</td>
                        </tr>
                        <tr>
                            <th>Max_Attendence</th>
                            <td>{{ $event->max_attendence }}</td>
                        </tr>
                        <tr>
                            <th>Created_at</th>
                            <td>{{ $event->created_at->diffForHumans() }}</td>
                        </tr>
                </table>
                @else
                <p class="text-danger fw-bold">no event</p>
                @endif
               </div>
            </div>
        </div>
    </div>
@section('script')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection

@endsection