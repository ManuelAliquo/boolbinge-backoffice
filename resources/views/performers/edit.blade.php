@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex gap-3 align-items-center ms-1 mb-3">
        <h2 class="text-secondary mb-1">Edit Performer</h2>
        <a class="btn btn-outline-dark" href="{{route('performers.index')}}">
            <i class="bi bi-arrow-left-circle"></i> Back</a>
    </div>
    <form class="card p-3 shadow-sm" action="{{route('performers.update', $performer)}}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- name --}}
        <div class="row mb-3 g-3">
            <div class="col-12">
                <label class="form-label ms-1 fs-5" for="performer-name">Name</label>
                <input id="performer-name" type="text" class="form-control" name="name"
                    value="{{ old('name', $performer->name) }}" placeholder="Insert performer's Name" required>
            </div>
        </div>
        {{-- picture --}}
        <div class="mb-4">
            <div class="card p-2">
                <div class="d-flex gap-4 align-items-center">
                    <div class="flex-grow-1 ms-2">
                        <label class="form-label ms-1 fs-5" for="performer-picture">Picture</label>
                        <input class="form-control" type="file" id="performer-picture" name="picture">
                    </div>
                    @if($performer->picture)
                        <img alt="preview" class="content-thumbnail img-thumbnail" 
                            src="{{str_starts_with($performer->picture, 'imgs/') ? asset($performer->picture) : asset('storage/' . $performer->picture)}}">
                    @endif
                </div>
            </div>
        </div>
        {{-- contents --}}
        <div class="mb-4">
            <label class="form-label ms-1 fs-5">Appearances & Works</label>
            <input type="text" id="contents-filter" class="form-control mb-2"
                placeholder="Search movies, shows or anime...">
            <div class="form-search-results border rounded p-3 bg-white overflow-y-auto" id="contents-list">
                @foreach ($contents as $content)
                    <div class="content-item form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="contents[]" 
                            id="content-{{ $content->id }}" value="{{ $content->id }}"
                            {{ $performer->contents->contains($content->id) ? 'checked' : '' }}>
                        <label class="form-check-label d-block w-100 text-dark fw-semibold" for="content-{{ $content->id }}">
                            {{ $content->title }} 
                            <span class="text-muted fw-normal small ms-1">({{ ucfirst($content->type) }} - {{ $content->release_year }})</span>
                        </label>
                    </div>
                @endforeach
                <div id="no-contents-message" class="text-muted text-center py-3 d-none">
                    <i class="bi bi-exclamation-circle me-1"></i> No matching content found.
                </div>
            </div>
        </div>
        {{-- submit --}}
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success px-5 fw-semibold fs-5 shadow-sm">Save Performer</button>
        </div>
    </form>
</div>
@endsection