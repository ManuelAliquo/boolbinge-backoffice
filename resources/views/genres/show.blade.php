@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="mb-4 border-bottom pb-3">
            <h1 class="fw-bold">Genre: {{ $genre->name }}</h1>
            <p class="text-muted fs-5">{{$genre->description}}</p>
            <div class="d-flex gap-2">
                <a class="btn btn-outline-dark" href="{{route('dashboard')}}">
                    <i class="bi bi-arrow-left-circle"></i> Back</a>
                <a class="btn btn-warning" href="{{route('genres.edit', $genre)}}">
                    <i class="bi bi-pencil-square"></i> Edit</a>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#showGenreDeleteModal">
                    <i class="bi bi-trash3"></i> Delete
                </button>
            </div>
        </div>
        <div>
            <ul class="list-unstyled">
                @foreach ($genre->contents as $content)
                    <li class="fs-5 fw-semibold border rounded-4 px-3 py-2 mb-2">
                        <div class="d-flex justify-content-between">
                            <span>{{$content->title}}</span>
                            <a class="btn btn-info border border-dark"
                            href="{{route('contents.show', $content)}}">
                            <i class="bi bi-info-square"></i> See More</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

{{-- index genre delete modal --}}
<div class="modal fade" id="showGenreDeleteModal" tabindex="-1" aria-labelledby="showGenreDeleteModalLabel" aria-hidden="true">
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