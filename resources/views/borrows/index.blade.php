@extends('layout.borrow')
@section('title', 'Borrow List')
@section('content')

<h2 class="text-center text-primary">Borrow List</h2>
@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">Index</th>
            <th scope="col">Reader</th>
            <th scope="col">Book</th>
            <th scope="col">Borrow Date</th>
            <th scope="col">Return Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrows as $borrow)
        <tr style="width: 100%">
            <th scope="row">{{$index++}}</th>
            <td>{{$borrow->reader->name}}</td>
            <td>{{$borrow->book->name}}</td>
            <td>{{$borrow->borrow_date}}</td>
            <td>{{$borrow->return_date}}</td>
            @if ($borrow->status == 0)
            <td>Borrowing</td>
            @else
            <td>Returned</td>
            @endif
            <td>
                <a class="btn btn-success" href="{{ route('borrows.show', $borrow->id) }}">Show Info</a>
            @if ($borrow->status == 0)
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Return Book
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Return Book</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to return this book?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{route('borrows.update', $borrow->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Return</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
{{$borrows->links('pagination::bootstrap-5')}}
@endsection