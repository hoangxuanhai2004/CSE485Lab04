@extends('layout.borrow')
@section('title', 'Borrow Info')
@section('content')
<div class="card mt-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title mb-1">{{$borrow->book->name}}</h5>
    <div class="card-text mb-1">Reader: {{$borrow->reader->name}}</div>
    <div class="card-text mb-1">Borrow Date: {{$borrow->borrow_date}}</div>
    <div class="card-text mb-1">Return Date: {{$borrow->return_date}}</div>
    <div class="card-text mb-1">Status: {{$borrow->status ? 'Returned' : 'Borrowing'}}</div>
    <a href="{{route('borrows.index')}}" class="btn btn-secondary">Back</a>
  </div>
</div>
@endsection