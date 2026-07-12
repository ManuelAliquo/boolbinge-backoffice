@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="d-flex gap-3 align-items-center ms-1 mb-3">
            <h2 class="text-secondary mb-1">Edit Content</h2>
            <a class="btn btn-outline-dark" href="{{route('contents.index')}}">
                <i class="bi bi-arrow-left-circle"></i> Back</a>
        </div>
        <form class="card p-3 shadow-sm" action="{{route('contents.update', $content)}}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- type - production --}}
            <div class="row mb-3 g-3">
                <div class="col-12 col-sm-6">
                    <label class="form-label ms-1 fs-5" for="content-type">Type</label>
                    <select id="content-type" class="form-select" name="type" required>
                        <option selected value="">Select Content Type</option>
                        @foreach ($types as $type)
                            <option {{$content->type == $type ? 'selected' : ''}} value="{{$type}}">
                                {{ucfirst($type)}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6">
                    <label class="form-label ms-1 fs-5" for="content-production">Production</label>
                    <input class="form-control" type="text" name="production" id="content-production"
                           placeholder="Director / Network / Studio" value="{{$content->production}}">
                </div>
            </div>
            {{-- title - length --}}
            <div class="row mb-3 g-3">
                <div class="col-12 col-sm-8">
                    <label class="form-label ms-1 fs-5" for="content-title">Title</label>
                    <input class="form-control" id="content-title" name="title"
                           type="text" placeholder="Insert Content Title" required value="{{$content->title}}">
                </div>
                <div class="col-12 col-sm-4">
                    <label class="form-label ms-1 fs-5" for="content-length">Length</label>
                    <input class="form-control" id="content-length" name="length"
                           type="text" placeholder="Select type first..." value="{{$content->length}}">
                </div>
            </div>
            {{-- release_year - end_year (JS) --}}
            <div class="row mb-3 g-3">
                <div class="col-12 col-sm-6">
                    <label class="form-label ms-1 fs-5" for="content-year">Release Year</label>
                    <input class="form-control" id="content-year" name="release_year" type="number" min="1900" max="2030"
                           placeholder="Insert Release Year"  required value="{{$content->release_year}}">
                </div>
                <div class="col-12 col-sm-6 {{$content->type == 'show' || $content->type == 'anime' ? '' : 'd-none'}}" id="end-year-wrapper">
                    <label class="form-label ms-1 fs-5" for="content-end-year">End Year</label>
                    <input class="form-control" id="content-end-year" name="end_year" type="number" min="1900" max="2030"
                           placeholder="Leave empty if it's still ongoing" value="{{$content->end_year}}">
                </div>
            </div>
            {{-- rating - trailer --}}
            <div class="row mb-3 g-3">
                <div class="col-12 col-sm-6">
                    <label class="form-label ms-1 fs-5" for="content-rating">Rating</label>
                    <input class="form-control" id="content-rating" name="rating" type="number" min="0" max="10"
                           placeholder="Insert Rating (0 - 10)" step="0.1" value="{{$content->rating}}">
                </div>
                <div class="col-12 col-sm-6">
                    <label class="form-label ms-1 fs-5" for="content-trailer">Trailer URL</label>
                    <input class="form-control" id="content-trailer" name="trailer" type="url"
                           placeholder="https://example.com/trailer-link" value="{{$content->trailer}}">
                </div>
            </div>
            {{-- short-description --}}
            <div class="mb-3">
                <label class="form-label ms-1 fs-5" for="content-shortDescription">Short Description</label>
                <textarea class="form-control" id="content-shortDescription" name="short_description" rows="2"
                          placeholder="Insert a quick introduction">{{$content->short_description}}</textarea>
            </div>
            {{-- long-description --}}
            <div class="mb-3">
                <label class="form-label ms-1 fs-5" for="content-longDescription">Plot (Long Description)</label>
                <textarea class="form-control" id="content-longDescription" name="long_description" rows="5"
                    placeholder="Insert the full plot">{{ $content->long_description }}</textarea>
            </div>
            {{-- img --}}
            <div class="mb-4">
                <div class="card p-2">
                    <div class="d-flex gap-4 align-items-center">
                        <div class="flex-grow-1 ms-2">
                            <label class="form-label ms-1 fs-5" for="content-image">Cover Image</label>
                            <input class="form-control" type="file" id="content-image" name="cover_image">
                        </div>
                        @if($content->cover_image)
                            <img alt="preview" class="img-thumbnail" 
                                 style="max-height: 180px; width: auto; object-fit: cover;" 
                                 src="{{str_starts_with($content->cover_image, 'imgs/') ? asset($content->cover_image) : asset('storage/' . $content->cover_image)}}">                            
                        @endif
                    </div>
                </div>
            </div>
            {{-- genres --}}
            <div class="mb-4">
                <label class="form-label ms-1 fs-5">Genres</label>
                <div class="d-flex gap-3 flex-wrap mb-3 px-1">
                    @foreach ($genres as $genre)
                        <div class="form-check">
                            <input {{$content->genres->contains($genre->id) ? 'checked' : ''}} 
                                   class="form-check-input" id="genre-{{$genre->id}}" 
                                   name="genres[]" value="{{$genre->id}}" type="checkbox">
                            <label class="form-check-label" for="genre-{{$genre->id}}">{{$genre->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- submit --}}
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success px-5 fw-semibold fs-5 shadow-sm">Save Content</button>
            </div>
        </form>
    </div>
@endsection