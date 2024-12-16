@extends('layouts.auth')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Events </h4>
                <p class="card-description"> All Location of Events </p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $errors)
                                <li>{{ $errors }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" class="forms-sample" action="{{ route('events.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="text">Description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="5"
                            placeholder="Enter Description here.."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">Categories</label>
                        <select name="category" class="form-control" id="exampleSelectGender">
                            <option value="" disabled selected>Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Location</label>
                        <select class="form-control" name="location" id="exampleSelectGender">
                            <option value="" disabled selected>Choose Option</option>
                            <option value="islamabad">Islamabad</option>
                            <option value="karachi">Krachi</option>
                            <option value="lahore">lahore</option>
                            <option value="gojra">gpjra</option>
                            <option value="fsd">fsd</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Type</label>
                        <select class="form-control" name="type" id="exampleSelectGender">
                            <option value="" disabled selected>Choose Option</option>
                            <option value="free">free</option>
                            <option value="paid">paid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Price</label>
                        <input type="number" class="form-control" id="exampleInputCity1" name="price"
                            placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Start_Time</label>
                        <input type="date" class="form-control" id="exampleInputCity1" name="start_time">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">End_Time</label>
                        <input type="date" class="form-control" id="exampleInputCity1" name="end_time">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Max_attendence</label>
                        <input type="number" class="form-control" id="exampleInputCity1" name="max_attendence"
                            placeholder="1">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
