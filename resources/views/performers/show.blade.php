@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row border rounded-3 p-3 bg-white shadow-sm">
        {{-- picture --}}
        <div class="col-12 col-sm-8 mx-sm-auto col-md-5 col-lg-4 d-flex align-items-center justify-content-center mb-3 mb-md-0">
            <div class="poster rounded-3 border overflow-hidden w-100">
                @if($performer->picture)
                    <img class="img-fluid w-100 h-100 object-fit-cover" alt="{{$performer->title}}"
                        src="{{str_starts_with($performer->picture, 'imgs/') ? asset($performer->picture) : asset('storage/' . $performer->picture)}}">
                @else
                    <img class="img-fluid w-100 h-100 object-fit-cover" src="{{asset('imgs/placeholder.png')}}" alt="placeholder">
                @endif
            </div>
        </div>
        {{-- INFO --}}
        <div class="col-12 col-md-7 col-lg-8 mt-lg-3 d-flex flex-column content-info">
            {{-- name - works--}}
            <h1 class="fw-bold mb-4 text-dark">{{$performer->name}}</h1>
            <div class="card mb-3 shadow-sm">
                <div class="bg-dark-subtle p-3 fw-semibold fs-5">
                    <i class="bi bi-person-fill"></i> Roles
                </div>
                <div class="card-body">
                    <div class="d-flex gap-3 flex-wrap">
                        @forelse ($performer->contents as $content)
                        <a class="btn btn-sm btn-outline-dark d-flex align-items-center gap-2 shadow-sm py-2 px-3 mb-1"
                            href="{{route('contents.show', $content)}}">
                            <i class="bi bi-film"></i>
                            <span class="fw-semibold">{{$content->title}}</span>
                            <span class="badge bg-secondary-subtle text-dark small">{{ucfirst($content->type)}}</span>
                        </a>
                        @empty
                        <span class="text-muted py-2 px-1">No contents assigned to this performer yet.</span>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- buttons --}}
            <div class="d-flex align-items-center justify-content-center justify-content-sm-end gap-2 mt-auto pt-3">
                <a class="btn btn-outline-dark" href="{{route('performers.index')}}">
                    <i class="bi bi-arrow-left-circle"></i> Back
                </a>
                <a class="btn btn-warning" href="{{route('performers.edit', $performer)}}">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
                <button class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#performerDeleteModal{{$performer->id}}">
                    <i class="bi bi-trash3"></i> Delete
                </button>
            </div>
        </div>
    </div>
</div>
{{-- delete modal --}}
<x-performer-delete-modal :performer="$performer"/>
@endsection
