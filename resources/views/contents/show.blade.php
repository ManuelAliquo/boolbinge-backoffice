@extends('layouts.app')

@section('content')
<div class="container my-3">
    <div class="row border rounded-3 p-2">
        <div class="col-12 col-sm-6 col-xl-4">
            {{-- title - year --}}
            <div class="mb-2">
                <h1 class="fw-bold mb-1">{{$content->title}}</h1>
                <span class="text-muted">{{$content->release_year}} - lenght WIP</span>
            </div>
            {{-- image --}}
            @if ($content->cover_image)
            <div class="cover-image rounded-3 border mb-3 overflow-hidden">
                <img class="img-fluid" src="{{asset('storage/' . $content->cover_image)}}" alt="cover_img">
            </div>
            @endif
        </div>
        <div class="col-12 col-sm-6 col-xl-8 d-flex flex-column justify-content-center content-info">
            {{-- genres --}}
            <div class="d-flex gap-2 flex-wrap mb-3">
                @foreach ($content->genres as $genre)
                    <span class="badge text-bg-secondary fs-6 py-2 px-3">{{ $genre->name }}</span>
                @endforeach
            </div>
            {{-- director - description - rating--}}
            <div class="card">
                <div class="fs-5 bg-secondary-subtle px-3 py-2">Director: WIP</div>
                <div class="card-body pt-2">
                    <p class="mb-0">{{$content->description}}</p>
                    <div class="text-end">Rating: WIP</div>
                </div>
            </div>
            {{-- buttons --}}
            <div class="d-flex align-items-center flex-wrap justify-content-center mt-3 gap-2">
                <a class="btn btn-outline-dark" href="{{route('contents.index')}}">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-arrow-left-circle"></i>
                        <span>Back</span>
                    </div>
                </a>
                <a class="btn btn-warning" href="{{route('contents.edit', $content)}}">
                    <div class="d-flex align-items-center gap-1">
                        <i class="bi bi-pencil-square"></i>
                        <span>Edit</span>
                    </div>
                </a>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <div class="d-flex align-items-center gap-1">
                        <i class="bi bi-trash3"></i>
                        <span>Delete</span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- content delete modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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