@extends('layouts.app')

@section('content')
<div class="container my-3">
    <div class="row border rounded-3 p-2">
        <div class="col-12 col-sm-6 col-lg-5 col-xl-4">
            {{-- title - year - length --}}
            <div class="mb-2">
                <h1 class="fw-bold mb-1">{{$content->title}}</h1>
                <div class="text-muted">
                    <span>{{$content->release_year}} - </span>
                    @if ($content->length)
                    <span><i class="bi bi-clock text-muted"></i> {{$content->length}}</span>
                    @endif
                </div>
            </div>
            {{-- image --}}
            <div class="cover-image rounded-3 border mb-3 overflow-hidden">
                @if ($content->cover_image && $content->cover_image != 'imgs/placeholder.png')
                    <img class="img-fluid" src="{{asset('storage/' . $content->cover_image)}}" alt="cover_img">
                @endif
                @if ($content->cover_image && $content->cover_image == 'imgs/placeholder.png')
                    <img class="img-fluid" src="{{asset('imgs/placeholder.png')}}" alt="cover_img">
                @endif
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-7 col-xl-8 d-flex flex-column justify-content-center content-info">
            {{-- genres --}}
            <div class="d-flex gap-2 flex-wrap mb-3">
                @forelse ($content->genres as $genre)
                    <span class="badge text-bg-secondary fs-6 py-2 px-3">{{ $genre->name }}</span>
                @empty
                @endforelse
            </div>
            {{-- production - description - rating--}}
            <div class="card">
                @if ($content->production)
                <div class="fs-5 bg-secondary-subtle px-3 py-2 fw-semibold">{{$content->production}}</div>
                @endif
                <div class="card-body pt-2">
                    @if ($content->description)
                        <p class="mb-0">{{$content->description}}</p>
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
            <div class="d-flex align-items-center flex-wrap justify-content-center mt-3 gap-2">
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
        <h3 class="modal-title fw-bold" id="deleteModalLabel">Delete "{{$content->title}}"</h3>
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