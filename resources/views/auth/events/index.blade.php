@extends('layouts.auth')
@section('content')
    <a href="" class="mb-5">Events</a>
    <div class="col-lg-12 grid-margin stretch-card mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Striped Table</h4>

                <div class="table-responsive">
                    @if (count($events) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Location</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Max_Attendence</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ Str::limit($event->description, 20) }}</td>
                                        <td>{{ number_format($event->price,2) }}</td>
                                        <td>{{ $event->location }}</td>
                                        <td>{{ $event->category ? $event->category->name : '' }}</td>
                                        <td>
                                            @if ($event->type == 'free')
                                                <span class="badge badge-primary">{{ $event->type }}</span>
                                            @elseif ($event->type == 'paid')
                                                <span class="badge badge-success">{{ $event->type }}</span>
                                            @else
                                                <span class="badge badge-info">{{ $event->type }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $event->max_attendence }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary">Show</a>
                                            <a href="" class="btn btn-primary">Edit</a>

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
