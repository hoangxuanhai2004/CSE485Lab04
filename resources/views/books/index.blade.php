@php
$id = 0    

@endphp
@extends('layout.app')

@section('content')

@if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif
    <h1 class="text-center text-primary">Book List</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Public year</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
          <tr>
            <th scope="row">{{ ++$id }}</th>
            <td>{{ $book->name }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->category }}</td>
            <td>{{ $book->public_year }}</td>
            <td>{{ $book->quantity }}</td>   
            <td class ='text-center'><a href = "{{ route('books.show',$book->id) }}"><i class="bi bi-eye-fill"></i></a></td>
        <td class ='text-center'><a href = "{{ route('books.edit',$book->id) }}"><i class="bi bi-pencil-fill"></i></a></td>
        <td class ='text-center'>
          <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $book->id }}">
            <i class="bi bi-trash-fill"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $book->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $book->id }}">Warning</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete this book: <strong>{{ $book->name }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <form id="deleteForm{{ $book->id }}" action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </td>

             

          </tr>
          @endforeach
          
        </tbody>
      </table>
      <div>
        {{ $books->links('pagination::bootstrap-5') }}
    </div>

@endsection