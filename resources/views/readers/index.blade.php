@extends('layout.app')

@section('content')
    <div class="container">
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif
        <h1 class="text-center text-primary">Reader List</h1>
        <table class="table mt-4 align-middle">
            <thead class="text-center">
                <tr class="border-bottom border-dark">
                    <th>Index</th>
                    <th>Name</th>
                    <th style="width: 20%;">Date of Birth</th>
                    <th style="width: 30%;">Address</th>
                    <th style="width: 20%;">Phone number</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $i = 1 ?>
                @foreach ($reader as $read)
                    <tr class="border-bottom border-dark-subtle">
                        <th><?= $i ?></th>
                        <td>{{ $read->name }}</td>
                        <td>{{ $read->dob }}</td>
                        <td>{{ $read->address }}</td>
                        <td>{{ $read->phone_number }}</td>
                        <td class="text-center m-4 p-3">
                            <a href="{{ route('readers.show', $read->id) }}"><i class="bi bi-eye text-secondary"></i></a>
                        </td>
                        <td class="text-center m-4 p-3">
                        <a href="{{ route('readers.edit', $read->id) }}"><i class="bi bi-pencil text-warning"></i></a>
                        </td>
                        <td class="text-center m-4 p-3">
                        <a href=""
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal"
                                data-id="{{ $read->id }}" 
                                data-name="{{ $read->name }}">
                                <i class="bi bi-trash text-danger"></i></div>
                            </a>
                        </td>         
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <span id="readerName"></span>? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <!-- Updated form with dynamic action -->
                    <form id="deleteForm" action="{{ route('readers.destroy', $read->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
                            </form>
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        <div>{{$reader->links("pagination::bootstrap-5")}}</div>
    </div>
@endsection
