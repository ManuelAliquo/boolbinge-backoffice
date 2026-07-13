@extends('layouts.app')

@section('content')
<div class="container my-4">
    {{-- search --}}
    <form action="{{route('contents.index')}}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search a title..." 
                value="{{request('search')}}">
            <button type="submit" class="btn btn-primary">Search</button>
            @if ($search)
            <a href="{{route('contents.index')}}" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i></a>
            @endif
        </div>
    </form>
    {{-- header --}}
    <div class="d-flex justify-content-between align-items-center ms-1 mb-4 flex-wrap">
        <h2 class="text-secondary mb-1">Content</h2>
        <div>
            <a class="btn btn-outline-dark" href="{{route('dashboard')}}">
                <i class="bi bi-arrow-left-circle"></i> Back</a>
            <a class="btn btn-success shadow-sm fw-semibold" href="{{route('contents.create')}}">
                <i class="bi bi-plus-circle me-1"></i> Add Content</a>
        </div>
    </div>
    {{-- MOVIES --}}
    @if (!$movies->isEmpty())
    <div class="border-bottom pb-3 mt-4">
        @foreach ($movies as $content)
            <div class="card mb-3 d-flex flex-column flex-sm-row overflow-hidden">
                <div class="flex-grow-1 d-flex flex-column">
                    <div class="bg-dark-subtle px-3 py-2">
                        <b class="fs-4 mb-1">{{$content->title}}</b> - {{$content->release_year}}
                    </div>
                    <div class="card-body d-flex flex-column flex-grow-1">
                        <div>
                            <div class="d-flex gap-2 flex-wrap my-2">
                                @foreach ($content->genres as $genre)
                                    <a class="badge text-bg-info" href="{{route('genres.show', $genre)}}">
                                        {{$genre->name}}</a> 
                                @endforeach
                            </div>
                            <div class="fw-semibold">
                                @if ($content->production) 
                                <span>{{$content->production}} - </span>
                                @endif
                                @if ($content->rating)
                                <span><i class="bi bi-star-fill text-warning"></i> {{$content->rating}} - </span>
                                @endif
                                @if ($content->length)
                                <span><i class="bi bi-clock text-muted"></i> {{$content->length}}</span>
                                @endif
                            </div>
                            <p class="mt-2">{{$content->short_description}}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                            <div>
                                <a class="btn btn-warning me-1" href="{{route('contents.edit', $content)}}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#contentDeleteModal{{$content->id}}">
                                    <i class="bi bi-trash3"></i> Delete
                                </button>
                            </div>
                            <a class="btn btn-info border border-dark" href="{{route('contents.show', $content)}}">
                                <i class="bi bi-info-square"></i> See More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5 col-md-3 col-lg-2 d-flex align-items-center justify-content-center bg-light">
                    <img class="img-fluid w-100 h-100 object-fit-cover" alt="{{$content->title}}"
                            src="{{$content->cover_image && str_starts_with($content->cover_image, 'imgs/') ? asset($content->cover_image) : ($content->cover_image ? asset('storage/' . $content->cover_image) : asset('imgs/placeholder.png'))}}">
                </div>
            </div>
            {{-- delete modal --}}
            <x-content-delete-modal :content="$content"/>
        @endforeach
    </div>
    @endif
    {{-- SHOWS --}}
    @if (!$shows->isEmpty())
    <div class="border-bottom pb-3 mt-3">
        <h3 class="text-secondary ms-1">Shows</h3>
        @foreach ($shows as $content)
            <div class="card mb-3 d-flex flex-column flex-sm-row overflow-hidden">
                <div class="flex-grow-1 d-flex flex-column">
                    <div class="bg-dark-subtle px-3 py-2 d-flex align-items-center flex-wrap gap-2">
                        <b class="fs-4 mb-1">{{$content->title}}</b> 
                        <span class="text-muted">
                            {{$content->release_year}}
                            {{$content->end_year ? ' - ' . $content->end_year : ''}}
                        </span>
                        <span class="badge {{$content->end_year ? 'text-bg-secondary' : 'text-bg-success'}}">
                            {{$content->end_year ? 'Ended' : 'Ongoing'}}
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column flex-grow-1">
                        <div>
                            <div class="d-flex gap-2 flex-wrap my-2">
                                @foreach ($content->genres as $genre)
                                    <a class="badge text-bg-info" href="{{route('genres.show', $genre)}}">{{$genre->name}}</a> 
                                @endforeach
                            </div>
                            <div class="fw-semibold">
                                @if ($content->production) 
                                <span>{{$content->production}} - </span> 
                                @endif
                                @if ($content->rating) 
                                <span><i class="bi bi-star-fill text-warning"></i> {{$content->rating}} - </span> 
                                @endif
                                @if ($content->length) 
                                <span><i class="bi bi-tv text-muted"></i> {{$content->length}}</span> 
                                @endif
                            </div>
                            <p class="mt-2">{{$content->short_description}}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                            <div>
                                <a class="btn btn-warning me-1" href="{{route('contents.edit', $content)}}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#contentDeleteModal{{$content->id}}">
                                    <i class="bi bi-trash3"></i> Delete
                                </button>
                            </div>
                            <a class="btn btn-info border border-dark" href="{{route('contents.show', $content)}}">
                                <i class="bi bi-info-square"></i> See More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5 col-md-3 col-lg-2 d-flex align-items-center justify-content-center bg-light">
                    <img class="img-fluid w-100 h-100 object-fit-cover" alt="{{$content->title}}"
                            src="{{$content->cover_image && str_starts_with($content->cover_image, 'imgs/') ? asset($content->cover_image) : ($content->cover_image ? asset('storage/' . $content->cover_image) : asset('imgs/placeholder.png'))}}">
                </div>
            </div>
            {{-- delete modal --}}
            <x-content-delete-modal :content="$content"/>
        @endforeach
    </div>
    @endif
    {{-- ANIME --}}
    @if (!$anime->isEmpty())
    <div class="mt-3">
        <h3 class="text-secondary ms-1">Anime</h3>
        @foreach ($anime as $content)
            <div class="card mb-3 d-flex flex-column flex-sm-row overflow-hidden">
                <div class="flex-grow-1 d-flex flex-column">
                    <div class="bg-dark-subtle px-3 py-2 d-flex align-items-center flex-wrap gap-2">
                        <b class="fs-4 mb-1">{{$content->title}}</b> 
                        <span class="text-muted">
                            {{$content->release_year}}
                            {{$content->end_year ? ' - ' . $content->end_year : ''}}
                        </span>
                        <span class="badge {{$content->end_year ? 'text-bg-secondary' : 'text-bg-success'}}">
                            {{$content->end_year ? 'Ended' : 'Ongoing'}}
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column flex-grow-1">
                        <div>
                            <div class="d-flex gap-2 flex-wrap my-2">
                                @foreach ($content->genres as $genre)
                                    <a class="badge text-bg-info" href="{{route('genres.show', $genre)}}">
                                        {{$genre->name}}</a> 
                                @endforeach
                            </div>
                            <div class="fw-semibold">
                                @if ($content->production) 
                                <span>{{$content->production}} - </span> 
                                @endif
                                @if ($content->rating) 
                                <span><i class="bi bi-star-fill text-warning"></i> {{$content->rating}} - </span>
                                @endif
                                @if ($content->length) 
                                <span><i class="bi bi-film text-muted"></i> {{$content->length}}</span>
                                @endif
                            </div>
                            <p class="mt-2">{{$content->short_description}}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                            <div>
                                <a class="btn btn-warning me-1" href="{{route('contents.edit', $content)}}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#contentDeleteModal{{$content->id}}">
                                    <i class="bi bi-trash3"></i> Delete
                                </button>
                            </div>
                            <a class="btn btn-info border border-dark" href="{{route('contents.show', $content)}}">
                                <i class="bi bi-info-square"></i> See More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5 col-md-3 col-lg-2 d-flex align-items-center justify-content-center bg-light">
                    <img class="img-fluid w-100 h-100 object-fit-cover" alt="{{$content->title}}"
                            src="{{$content->cover_image && str_starts_with($content->cover_image, 'imgs/') ? asset($content->cover_image) : ($content->cover_image ? asset('storage/' . $content->cover_image) : asset('imgs/placeholder.png'))}}">
                </div>
            </div>
            {{-- delete modal --}}
            <x-content-delete-modal :content="$content"/>
        @endforeach
    </div>
    @endif
</div>
@endsection