@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex gap-3 align-items-center ms-1 mb-3">
        <h2 class="text-secondary mb-1">New Content</h2>
        <a class="btn btn-outline-dark" href="{{route('contents.index')}}">
            <i class="bi bi-arrow-left-circle"></i> Back</a>
    </div>
    <form class="card p-3 shadow-sm" action="{{route('contents.store')}}"
        method="POST" enctype="multipart/form-data">
        @csrf
        {{-- type - production --}}
        <div class="row mb-3 g-3">
            <div class="col-12 col-sm-6">
                <label class="form-label ms-1 fs-5" for="content-type">Type</label>
                <select id="content-type" class="form-select" name="type" required>
                    <option selected value="">Select Content Type</option>
                    @foreach ($types as $type)
                        <option value="{{$type}}">{{ucfirst($type)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <label class="form-label ms-1 fs-5" for="content-production">Production</label>
                <input class="form-control" type="text" name="production" id="content-production"
                        placeholder="Select type first...">
            </div>
        </div>
        {{-- title - length --}}
        <div class="row mb-3 g-3">
            <div class="col-12 col-sm-8">
                <label class="form-label ms-1 fs-5" for="content-title">Title</label>
                <input class="form-control" id="content-title" name="title"
                        type="text" placeholder="Insert Title" required>
            </div>
            <div class="col-12 col-sm-4">
                <label class="form-label ms-1 fs-5" for="content-length">Length</label>
                <input class="form-control" id="content-length" name="length"
                        type="text" placeholder="Select type first...">
            </div>
        </div>
        {{-- release_year - end_year (JS) --}}
        <div class="row mb-3 g-3">
            <div class="col-12 col-sm-6">
                <label class="form-label ms-1 fs-5" for="content-year">Release Year</label>
                <input class="form-control" id="content-year" name="release_year" type="number"
                        placeholder="Insert Release Year" min="1900" max="2030" required>
            </div>
            <div class="col-12 col-sm-6 d-none" id="end-year-wrapper">
                <label class="form-label ms-1 fs-5" for="content-end-year">End Year</label>
                <input class="form-control" id="content-end-year" name="end_year" type="number"
                        placeholder="Leave empty if it's still ongoing" min="1900" max="2030">
            </div>
        </div>
        {{-- rating - trailer --}}
        <div class="row mb-3 g-3">
            <div class="col-12 col-sm-6">
                <label class="form-label ms-1 fs-5" for="content-rating">Rating</label>
                <input class="form-control" id="content-rating" name="rating" type="number"
                        placeholder="Insert Rating (0 - 10)" min="0" max="10" step="0.1">
            </div>
            <div class="col-12 col-sm-6">
                <label class="form-label ms-1 fs-5" for="content-trailer">Trailer URL</label>
                <input class="form-control" id="content-trailer" name="trailer" type="url"
                        placeholder="https://example.com/trailer-link">
            </div>
        </div>
        {{-- short-description --}}
        <div class="mb-3">
            <label class="form-label ms-1 fs-5" for="content-shortDescription">Short Description</label>
            <textarea class="form-control" id="content-shortDescription" name="short_description" rows="2"
                        placeholder="Insert a quick introduction"></textarea>
        </div>
        {{-- long-description --}}
        <div class="mb-3">
            <label class="form-label ms-1 fs-5" for="content-longDescription">Plot (Long Description)</label>
            <textarea class="form-control" id="content-longDescription" name="long_description" rows="5"
                        placeholder="Insert the full plot"></textarea>
        </div>
        {{-- genres --}}
        <div class="mb-3">
            <label class="form-label ms-1 fs-5">Genres</label>
            <div class="d-flex gap-3 flex-wrap mb-3 px-1">
                @foreach ($genres as $genre)
                <div class="form-check">
                    <input class="form-check-input" id="genre-{{$genre->id}}" name="genres[]"
                    value="{{$genre->id}}" type="checkbox">
                    <label class="form-check-label" for="genre-{{$genre->id}}">{{$genre->name}}</label>
                </div>
                @endforeach
            </div>
        </div>
        {{-- performers --}}
        <div class="mb-4">
            <label class="form-label ms-1 fs-5">Performers</label>
            <input type="text" id="performers-filter" class="form-control mb-2"
                placeholder="Insert the Performer's Name...">
            <div class="form-search-results border rounded p-3 bg-white overflow-y-auto"
            id="performers-list">
                @foreach ($performers as $performer)
                    <div class="performer-item form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="performers[]" 
                            id="performer-{{$performer->id}}" value="{{$performer->id}}">
                        <label class="form-check-label d-block w-100" for="performer-{{$performer->id}}">
                            {{$performer->name}}
                        </label>
                    </div>
                @endforeach
                <div id="no-performers-message" class="text-muted alert alert-warning d-none">
                    <i class="bi bi-exclamation-circle me-1"></i> Performer not found.
                </div>
            </div>
        </div>
        {{-- IMAGES --}}
        {{-- poster --}}
        <div class="mb-4">
            <label class="form-label ms-1 fs-5" for="poster">Poster</label>
            <input class="form-control" type="file" id="poster" name="poster">
        </div>
        {{-- logo --}}
        <div class="mb-4">
            <label class="form-label ms-1 fs-5" for="logo">Logo</label>
            <input class="form-control" type="file" id="logo" name="logo">
        </div>
        {{-- background --}}
        <div class="mb-4">
            <label class="form-label ms-1 fs-5" for="background">Background</label>
            <input class="form-control" type="file" id="background" name="background">
        </div>
        {{-- submit --}}
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success px-5 fw-semibold fs-5 shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Add Content</button>
        </div>
    </form>
</div>
@endsection