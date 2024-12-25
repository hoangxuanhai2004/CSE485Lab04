@extends('layout.app')

@section('content')
    <div class="container" style="max-width: 70%">
        <h1 class="text-center text-primary mb-4">Reader Edit</h1>
        <form action="{{ route('readers.update', $reader->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="bg-body-secondary p-4">
            <div class="form-group">
                <h6 class="mb-2">Name:</h6>
                <input type="text" class="form-control" id="name" name="name" value="{{$reader->name}}" required>
            </div>
            <div class="form-group mt-4">
                <h6 class="mb-2">Date of Birth:</h6>
                <input type="date" class="form-control" id="dob" name="dob" value="{{$reader->dob}}" required>
            </div>
            <div class="form-group mt-4">
                <h6 class="mb-2">Address:</h6>
                <input type="text" class="form-control" id="address" name="address" value="{{$reader->address}}" required>
            </div>
            <div class="form-group mt-4">
                <h6 class="mb-2">Phone Number:</h6>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{$reader->phone_number}}" required>
            </div>
            <button type="submit" class="btn btn-outline-warning mt-4 px-4">Save</button>
            </div>
        </form>
    </div>
@endsection
