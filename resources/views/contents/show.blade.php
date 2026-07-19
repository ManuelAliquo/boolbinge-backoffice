@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row border rounded-3 p-3 bg-white shadow-sm">
        {{-- IMAGE --}}
        <div class="col-12 col-sm-8 mx-sm-auto col-md-5 col-lg-4 d-flex align-items-center justify-content-center mb-3 mb-md-0">
            <div class="poster rounded-3 border overflow-hidden w-100">
                @if($content->poster)
                    <img class="img-fluid w-100 h-100 object-fit-cover" alt="{{$content->title}}"
                        src="{{asset('storage/' . $content->poster)}}">
                @else
                    <img class="img-fluid w-100 h-100 object-fit-cover" src="{{asset('imgs/content-posters/poster-placeholder.png')}}" alt="placeholder">
                @endif
            </div>
        </div>
        {{-- INFO --}}
        <div class="col-12 col-md-7 col-lg-8 mt-lg-3 d-flex flex-column content-info">
            {{-- title - production - year - status --}}
            <div class="mb-3">
                <div class="d-flex align-items-center flex-wrap gap-2 mb-1">
                    <h1 class="fw-bold mb-0">{{$content->title}}</h1>
                    @if($content->type !== 'movie')
                        <span class="badge {{$content->end_year ? 'text-bg-secondary' : 'text-bg-success'}} shadow-sm">
                            {{$content->end_year ? 'Ended' : 'Ongoing'}}
                        </span>
                    @endif
                </div>
                <div class="fs-5 text-secondary">
                    @if ($content->production)
                        <span class="fw-semibold text-dark">{{$content->production}}</span>
                        <span> • </span>
                    @endif
                    <span>
                        {{$content->release_year}}
                        {{$content->type !== 'movie' && $content->end_year ? ' - ' . $content->end_year : ''}}
                    </span>
                </div>
                {{-- length - rating --}}
                <div class="text-muted mt-2 fw-semibold">
                    @if ($content->length)
                        <span>
                            <i class="bi bi-film text-muted"></i> {{$content->length}}
                        </span>
                    @endif
                    @if ($content->rating)
                        @if ($content->length) <span> - </span> @endif
                        <span class="text-dark">
                            <i class="bi bi-star-fill text-warning fs-5"></i>
                            {{$content->rating}}<small class="text-muted">/10</small>
                        </span>
                    @endif
                </div>
            </div>
            {{-- details --}}
            <div class="card mb-3 shadow-sm">
                {{-- genres --}}
                <div class="d-flex gap-2 flex-wrap bg-dark-subtle p-3">
                    @forelse ($content->genres as $genre)
                        <a class="badge text-bg-secondary fs-6 text-decoration-none"
                        href="{{route('genres.show', $genre)}}">{{$genre->name}}</a>
                    @empty
                        <span class="text-muted">No genres assigned</span>
                    @endforelse
                </div>
                <div class="card-body">
                    {{-- description - trailer --}}
                    @if ($content->long_description)
                        <p class="fw-semibold mb-0">{{$content->long_description}}</p>
                    @endif
                    @if ($content->trailer)
                        <div class="mt-3 pt-2">
                            <a href="{{$content->trailer}}" target="_blank" class="btn btn-danger px-3 shadow-sm">
                                <i class="bi bi-play-btn-fill"></i> Watch Trailer
                            </a>
                        </div>
                    @endif
                    {{-- performers --}}
                    @if($content->performers && $content->performers->isNotEmpty())
                        <div class="mt-3 pt-3 border-top">
                            <span class="text-secondary d-block mb-3 fs-5 fw-semibold">Performers</span>
                            <div class="d-flex gap-2 flex-wrap">
                                @foreach ($content->performers as $performer)
                                    <a class="btn btn-light py-1 border shadow-sm fs-6 fw-normal"
                                    href="{{route('performers.show', $performer)}}">
                                        <i class="text-muted bi bi-people-fill me-1"></i> {{$performer->name}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            {{-- buttons --}}
            <div class="d-flex align-items-center justify-content-center justify-content-sm-end gap-2 mt-auto pt-3">
                <a class="btn btn-outline-dark" href="{{route('contents.index')}}">
                    <i class="bi bi-arrow-left-circle"></i> Back
                </a>
                <a class="btn btn-warning" href="{{route('contents.edit', $content)}}">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
                <button class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#contentDeleteModal{{$content->id}}">
                    <i class="bi bi-trash3"></i> Delete
                </button>
            </div>
        </div>
        {{-- MEDIAS (logo - bg) --}}
        <div class="mt-4 pt-3 border-top">
            <span class="text-secondary d-block mb-3 fs-5 fw-semibold">
                <i class="bi bi-images me-1"></i> Medias</span>
            <div class="row g-3">
                {{-- background Asset --}}
                <div class="col-12 col-sm-8 col-md-10 col-lg-6">
                    <div class="p-2 border rounded bg-light d-flex flex-column justify-content-between h-100">
                        @if($content->background)
                        <h6 class="text-muted fw-bold mb-1">Background</h6>
                        <div class="my-2 border rounded overflow-hidden">
                            <img src="{{asset('storage/' . $content->background)}}" alt="background" class="img-fluid object-fit-contain">
                        </div>
                        <button type="button" class="btn btn-outline-dark py-1 w-100" data-bs-toggle="modal" data-bs-target="#backgroundModal">
                            <i class="bi bi-eye-fill me-1"></i> View Background
                        </button>
                        @else
                        <div class="text-muted text-center py-2 small my-auto">No background uploaded</div>
                        @endif
                    </div>
                </div>
                {{-- logo Asset --}}
                <div class="col-12 col-sm-8 col-md-10 col-lg-6">
                    <div class="p-2 border rounded bg-light d-flex flex-column justify-content-between h-100">
                        @if($content->logo)
                        <h6 class="text-muted fw-bold mb-1">Logo</h6>
                        <div class="my-2 border rounded bg-secondary-subtle d-flex align-items-center justify-content-center p-2 ">
                            <img src="{{asset('storage/' . $content->logo)}}" alt="logo" class="img-fluid object-fit-contain">
                        </div>
                        <button type="button" class="btn btn-outline-dark py-1 w-100" data-bs-toggle="modal" data-bs-target="#logoModal">
                            <i class="bi bi-eye-fill me-1"></i> View Logo
                        </button>
                        @else
                        <div class="text-muted text-center py-2 small my-auto">No logo uploaded</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- delete modal --}}
<x-content-delete-modal :content="$content"/>
{{-- background overlay --}}
@if($content->background)
<div class="modal fade" id="backgroundModal" tabindex="-1" aria-labelledby="backgroundModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-dark border-0 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center p-4">
                <img src="{{asset('storage/' . $content->background)}}" 
                     alt="background" class="img-fluid object-fit-contain">
            </div>
        </div>
    </div>
</div>
@endif
{{-- logo overlay --}}
@if($content->logo)
<div class="modal fade" id="logoModal" tabindex="-1" aria-labelledby="logoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark border-0 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center p-4">
                <img src="{{asset('storage/' . $content->logo)}}" 
                     alt="logo" class="img-fluid object-fit-contain">
            </div>
        </div>
    </div>
</div>
@endif
@endsection