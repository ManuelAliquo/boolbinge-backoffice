@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center ms-1 mb-4 flex-wrap">
        <h2 class="text-secondary mb-1">Genres</h2>
        <div>
            <a class="btn btn-outline-dark" href="{{route('dashboard')}}">
                <i class="bi bi-arrow-left-circle"></i> Back</a>
            <a class="btn btn-success shadow-sm fw-semibold" href="{{route('genres.create')}}">
                <i class="bi bi-plus-circle me-1"></i> Add Genre</a>
        </div>
    </div>
    {{-- all genres --}}
    @foreach ($genres as $genre)
    <div class="mb-3 border rounded-3 p-3 bg-white shadow-sm">
        <div class="d-flex flex-column flex-md-row align-items-center gap-3">
            <a class="btn btn-secondary fw-semibold fs-5 flex-shrink-0 border-dark border-2"
            href="{{route('genres.show', $genre)}}">{{$genre->name}}</a>
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
                <button class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#genreDeleteModal{{$genre->id}}">
                    <i class="bi bi-trash3"></i> Delete
                </button>
            </div>
        </div>
    </div>
    {{-- delete modal --}}
    <x-genre-delete-modal :genre="$genre"/>
    @endforeach
</div>
@endsection