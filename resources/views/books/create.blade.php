@extends('layout.app')

@section('content')
<div class = "container"> 
    <h1 class="text-center text-primary">Add a book</h1>
<form action = "{{ route('books.store') }}" method = "POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name = 'name' >
    </div> 
    <div class="mb-3">
      <label for="author" class="form-label">Author</label>
      <input type = "text" class="form-control" id="author" name = 'author' >
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type ="text" class="form-control" id="category" name = 'category'>
    </div>

    <div class="mb-3">
        <label for="public_year">Public year :</label>
        <input type="number" class="form-control w-10" id="public_year" name="public_year" min = '2000' max = '2025'  step="1">
    </div>


    <div class="mb-3">
        <label for="quantity">Quantity :</label>
        <input type="number" class="form-control w-10" id="quantity" name="quantity" min="1" max="100" step="1">
    </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
    
  </form>
  <a href ="{{ route('books.index') }}" class = 'btn btn-secondary'>Back</a>
</div>

@endsection