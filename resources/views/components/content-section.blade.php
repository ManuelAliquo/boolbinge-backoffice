<div class="card mb-3 d-flex flex-row overflow-hidden">
    <div class="flex-grow-1">
        <div class="fs-5 bg-dark-subtle px-3 py-2">
            <b class="fs-5">{{$content->title}}</b> - {{$content->release_year}}
        </div>
        <div class="card-body">
            <div class="d-flex gap-2 flex-wrap my-2">
                @foreach ($content->genres as $genre)
                    <span class="badge text-bg-info">{{ $genre->name }}</span>
                @endforeach
            </div>
            <div>Director: WIP</div>
            <p class="mt-2">{{$content->description}}</p>
        </div>
    </div>
    @if($content->cover_image)
        <img src="{{asset('storage/' . $content->cover_image)}}"
        alt="preview" class="img-fluid" style="max-height: 220px;">
    @endif
</div>