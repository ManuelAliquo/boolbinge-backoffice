@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex gap-2 mb-3">
        <a class="btn btn-outline-dark fs-5" href="{{route('dashboard')}}">
            <i class="bi bi-arrow-left-circle"></i> Back</a>
        <a class="btn btn-success fs-5" href="{{route('genres.create')}}">Add Genre</a>
    </div>
    <h3 class="text-secondary ms-1 mb-3">All Genres</h3>
    @foreach ($genres as $genre)
        <div class="mb-3 border rounded-3 p-3">
            <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                <a class="btn btn-secondary fw-semibold fs-5 flex-shrink-0" href="">{{$genre->name}}</a>
                <p class="m-0 flex-grow-1 border rounded-4 p-3">
                    @if ($genre->description)
                    {{$genre->description}}
                    @else
                    ---
                    @endif
                </p>
                <div class="flex-shrink-0">
                    <a class="btn btn-warning" href="{{route('genres.edit', $genre)}}">
                        <i class="bi bi-pencil-square"></i> Edit</a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#indexGenreDeleteModal">
                        <i class="bi bi-trash3"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- index genre delete modal --}}
<div class="modal fade" id="indexGenreDeleteModal" tabindex="-1" aria-labelledby="indexGenreDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fw-bold" id="deleteModalLabel">Delete "{{$genre->name}}"</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-5">Sure you want to delete "{{$genre->name}}"?</div>
      <div class="modal-footer">
        <button class="btn btn-primary fs-5" data-bs-dismiss="modal">Dismiss</button>
        <form action="{{route('genres.destroy', $genre)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger fs-5" data-bs-toggle="modal"
            data-bs-target="#deleteModal">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div> 
@endsection