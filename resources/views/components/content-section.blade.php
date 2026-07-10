<div class="card mb-3 d-flex flex-column flex-sm-row overflow-hidden">
    {{-- info --}}
    <div class="flex-grow-1 d-flex flex-column">
        <div class="fs-5 bg-dark-subtle px-3 py-2">
            <b class="fs-5">{{$content->title}}</b> - {{$content->release_year}}
        </div>
        <div class="card-body d-flex flex-column flex-grow-1">
            <div>
                <div class="d-flex gap-2 flex-wrap my-2">
                    @forelse ($content->genres as $genre)
                    <a class="badge text-bg-info" href="{{route('genres.show', $genre)}}">{{ $genre->name }}</a> 
                    @empty
                    @endforelse
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
                <p class="mt-2">{{$content->description}}</p>
            </div>
            {{-- buttons --}}
            <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                <div>
                    <a class="btn btn-warning me-1" href="{{route('contents.edit', $content)}}">
                        <i class="bi bi-pencil-square"></i> Edit</a>
                    <button class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#indexContentDeleteModal{{$content->id}}">
                        <i class="bi bi-trash3"></i> Delete</button>
                </div>
                <a class="btn btn-info border border-dark" href="{{route('contents.show', $content)}}">
                    <i class="bi bi-info-square"></i> See More</a>
            </div>
        </div>
    </div>
    {{-- image --}}
    <div class="col-12 col-sm-5 col-md-3 col-lg-2 d-flex align-items-center justify-content-center bg-light">
        @if($content->cover_image && $content->cover_image != 'imgs/placeholder.png')
            <img class="img-fluid w-100 h-100 object-fit-cover"
            src="{{asset('storage/' . $content->cover_image)}}" alt="preview">
        @endif
        @if ($content->cover_image && $content->cover_image == 'imgs/placeholder.png')
            <img class="img-fluid w-100 h-100 object-fit-cover"
            src="{{asset('imgs/placeholder.png')}}" alt="preview">
        @endif
    </div>
    
{{-- index content delete modal --}}
<div class="modal fade" id="indexContentDeleteModal{{$content->id}}" tabindex="-1"
    aria-labelledby="indexContentDeleteModalLabel{{$content->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fw-bold" id="indexContentDeleteModalLabel">Delete "{{$content->title}}"</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-5">Sure you want to delete "{{$content->title}}"?</div>
      <div class="modal-footer">
        <button class="btn btn-primary fs-5" data-bs-dismiss="modal">Dismiss</button>
        <form action="{{route('contents.destroy', $content)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger fs-5" data-bs-toggle="modal"
            data-bs-target="#indexContentDeleteModal">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div> 
</div>