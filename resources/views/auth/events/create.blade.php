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
                        <label for="exampleInputName1">Event Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Event Name">
                    </div>
                    <div class="form-group">
                        <label for="text">Description</label>
                        <textarea name="description" id="description"  class="form-control" cols="30" rows="5"
                            placeholder="Enter Description here..{{ old('description') }}"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">Categories</label>
                        <select name="category_id" class="form-control" id="exampleSelectGender">
                            <option value="" disabled selected>Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Location</label>
                        <select class="form-control" name="location" id="exampleSelectGender">
                            <option value="" disabled selected>Choose Option</option>
                            <option value="islamabad"  @selected(old('location') == 'islamabad')>Islamabad</option>
                            <option value="karachi"   @selected(old('location') == 'karachi')>Krachi</option>
                            <option value="lahore"    @selected(old('location') == 'lahore')>lahore</option>
                            <option value="gojra"   @selected(old('location') == 'gojra')>gpjra</option>
                            <option value="fsd"   @selected(old('location') == 'fsd')>fsd</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Type</label>
                        <select class="form-control" name="type" id="exampleSelectGender">
                            <option value="" disabled selected>Choose Option</option>
                            <option value="free" @selected(old('type') == 'free')>free</option>
                            <option value="paid" @selected(old('type') == 'paid')>paid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Price</label>
                        <input type="number" class="form-control" id="exampleInputCity1" name="price" value="{{ old('price') }}"
                            placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Start_Time</label>
                        <input type="date" class="form-control" id="exampleInputCity1" name="start_time"  value="{{ old('start_time') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">End_Time</label>
                        <input type="date" class="form-control" id="exampleInputCity1" name="end_time" value="{{ old('end_time') }}"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Max_attendence</label>
                        <input type="number" class="form-control" id="exampleInputCity1" name="max_attendence"
                            placeholder="1"  >
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
