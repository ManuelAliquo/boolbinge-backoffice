@extends('layouts.app')

@section('content')
<div class="container my-3">
    <div class="row border rounded-3 p-2">
        <div class="col-12 col-sm-6 col-lg-5 col-xl-4 d-flex align-items-center">
            {{-- image --}}
            <div class="cover-image rounded-3 border mb-3 overflow-hidden">
                @if($content->cover_image)
                    <img class="img-fluid" alt="{{ $content->title }}"
                        src="{{ str_starts_with($content->cover_image, 'imgs/') ? asset($content->cover_image) : asset('storage/' . $content->cover_image) }}">
                @else
                    <img class="img-fluid" src="{{ asset('imgs/placeholder.png') }}" alt="placeholder">
                @endif
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-7 col-xl-8 d-flex flex-column content-info">
            {{-- title - year - length --}}
            <div class="mb-2 mt-4">
                <h1 class="fw-bold mb-1">{{$content->title}}</h1>
                <div class="text-muted">
                    <span>{{$content->release_year}} - </span>
                    @if ($content->length)
                    <span><i class="bi bi-clock text-muted"></i> {{$content->length}}</span>
                    @endif
                </div>
            </div>
            {{-- genres --}}
            <div class="d-flex gap-2 flex-wrap mb-3">
                @forelse ($content->genres as $genre)
                    <a class="badge text-bg-secondary fs-6" href="{{route('genres.show', $genre)}}">
                        {{ $genre->name }}</a>
                @empty
                @endforelse
            </div>
            {{-- production - short_description - rating--}}
            <div class="card mb-3">
                @if ($content->production)
                <div class="fs-5 bg-dark-subtle px-3 py-2 fw-semibold">{{$content->production}}</div>
                @endif
                <div class="card-body pt-2">
                    @if ($content->short_description)
                        <p class="mb-0">{{$content->short_description}}</p>
                    @else
                        <p>---</p>
                    @endif
                    @if ($content->rating)
                    <div class="text-end fw-semibold">
                        <i class="bi bi-star-fill text-warning fs-5"></i> {{$content->rating}}<small class="text-muted">/10</small>
                    </div>
                    @endif
                </div>
            </div>
            {{-- buttons --}}
            <div class="d-flex align-items-center justify-content-center justify-content-sm-end mt-3 gap-2 mt-auto">
                <a class="btn btn-outline-dark" href="{{route('contents.index')}}">
                    <i class="bi bi-arrow-left-circle"></i> Back
                </a>
                <a class="btn btn-warning" href="{{route('contents.edit', $content)}}">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#showContentDeleteModal">
                    <i class="bi bi-trash3"></i> Delete
                </button>
            </div>
        </div>
    </div>
</div>

{{-- show content delete modal --}}
<div class="modal fade" id="showContentDeleteModal" tabindex="-1" aria-labelledby="showContentDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fw-bold" id="showContentDeleteModalLabel">Delete "{{$content->title}}"</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-5">Sure you want to delete "{{$content->title}}"?</div>
      <div class="modal-footer">
        <button class="btn btn-primary fs-5" data-bs-dismiss="modal">Dismiss</button>
        <form action="{{route('contents.destroy', $content)}}" method="POST">
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