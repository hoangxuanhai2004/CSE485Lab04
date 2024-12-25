@extends('layout.borrow')
@section('title', 'Borrow Book')
@section('content')
<h1 class="text-center text-primary">Borrow Book</h1>
<form action="{{route('borrows.store')}}" method="POST">
    @if($errors->any())
    <div class="text-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
    <div class="mb-3">
        <label for="book_id" class="form-label">Book</label>
        <select class="form-select" name="book_id" id="book_id">
            @foreach ($books as $book)
            <option value="{{$book->id}}">{{$book->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="reader_id" class="form-label">Reader</label>
        <select class="form-select" id="reader_id" name="reader_id">
            @foreach ($readers as $reader)
            <option value="{{$reader->id}}">{{$reader->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="borrow_date" class="form-label">Borrow Date</label>
        <input type="date" name="borrow_date" class="form-control" min="" id="borrow_date">
    </div>
    <div class="mb-3">
        <label for="return_date" class="form-label">Return Date</label>
        <input type="date" name="return_date" class="form-control" id="return_date">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
    <a href="{{route('borrows.index')}}" class="btn btn-secondary">Back</a>
</form>
<script>
    document.getElementById("borrow_date").min = new Date().toISOString().split("T")[0];
    document.getElementById("return_date").min = document.getElementById("borrow_date").value;
</script>
@endsection