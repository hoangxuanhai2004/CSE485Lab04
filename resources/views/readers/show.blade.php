@extends('layout.app')

@section('content')
    <div class="container" style="max-width:80%">
        <h1 class="text-center text-primary p-3">Reader information</h1>
        <table class="table mt-3">
            <thead class="text-center">
                <tr>
                    <th class="border border-secondary">Name</th>
                    <th class="border border-secondary">Date of Birth</th>
                    <th class="border border-secondary">Address</th>
                    <th class="border border-secondary">Phone number</th>
                </tr>
            </thead>
        <tbody>
            <tr class="text-center">
                <td class="m-4 border border-secondary">{{ $reader->name}}</td>
                <td class="m-4 border border-secondary">{{ $reader->dob}}</td>
                <td class="m-4 border border-secondary">{{ $reader->address}}</td>
                <td class="m-4 border border-secondary">{{ $reader->phone_number}}</td>
            </tr>
        </table>
        <a href="{{ route('readers.index') }}" class="btn btn-outline-secondary mt-3 px-4">Back</a>
    </div>
@endsection
