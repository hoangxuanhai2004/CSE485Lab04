@extends('layout.app')

@section('content')
<div class = "container"> 
    <h1 class="text-center text-primary">Edit a book</h1>
<form action = "{{ route('books.update',$book->id) }}" method = "POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name = 'name' value = {{ $book->name }}>
    </div> 
    <div class="mb-3">
      <label for="author" class="form-label">Author</label>
      <input type = "text" class="form-control" id="author" name = 'author' value = {{ $book->author }}>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type ="text" class="form-control" id="category" name = 'category' value ={{ $book->category }}>
    </div>

    <div class="mb-3">
        <label for="public_year">Public year :</label>
        <input type="number" class="form-control w-10" id="public_year" name="public_year"  step="1" value = "{{ $book->public_year }}">
    </div>


    <div class="mb-3">
        <label for="quantity">Quantity :</label>
        <input type="number" class="form-control w-10" id="quantity" name="quantity" min="1" max="100" step="1" value = {{ $book->quantity }}>
    </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
    
  </form>
  <a href ="{{ route('books.index') }}" class = 'btn btn-secondary'>Back</a>
</div>

@endsection