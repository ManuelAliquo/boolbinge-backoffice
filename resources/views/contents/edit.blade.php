@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <form class="card p-3" action="{{route('contents.update', $content)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- type --}}
            <div class="mb-3">
                <label class="form-label fs-5" for="content-type">Type</label>
                <select id="content-type" class="form-select" name="type" required>
                    <option value="">Select Content Type</option>
                    @foreach ($types as $type)
                    <option {{$content->type == $type ? 'selected' : ''}} value="{{$type}}">
                        {{ucfirst($type)}}
                    </option>
                    @endforeach
                </select>
            </div>
            {{-- title --}}
            <div class="mb-3">
                <label class="form-label fs-5" for="content-title">Title</label>
                <input class="form-control" id="content-title" name="title"
                type="text" placeholder="Insert Content Title" value="{{$content->title}}" required>
            </div>
            {{-- year --}}
            <div class="mb-3">
                <label class="form-label fs-5" for="content-year">Release Year</label>
                <input class="form-control" id="content-year" name="release_year" type="number"
                 placeholder="Insert Release Year" min="1900" max="2030" value="{{$content->release_year}}" required>
            </div>
            {{-- description --}}
            <div class="mb-2">
                <label class="form-label fs-5" for="content-description">Description</label>
                <textarea class="form-control" id="content-description" name="description"
                placeholder="Insert Content Description" required>{{$content->description}}</textarea>
            </div>
            {{-- img --}}
            <div class="card p-2 mb-2">
                <div class="d-flex gap-4 align-items-center">
                    <div class="flex-grow-1 ms-2 mb-4">
                        <label class="form-label fs-5" for="content-image">Cover Image</label>
                        <input class="form-control" type="file" id="content-image" name="cover_image">
                    </div>
                    @if($content->cover_image)
                        <img src="{{ asset('storage/' . $content->cover_image) }}"
                        alt="preview" class="img-thumbnail" style="max-height: 180px;">
                    @endif
                </div>
            </div>
            {{-- genres --}}
            <div class="mb-4">
                <label class="form-label">Genres</label>
                <div class="d-flex gap-3 flex-wrap mb-3">
                @foreach ($genres as $genre)
                    <div class="form-check">
                        <input {{$content->genres->contains($genre->id) ? 'checked' : ''}} class="form-check-input" id="{{$genre->id}}" name="genres[]" value="{{$genre->id}}" type="checkbox">
                        <label class="form-check-label" for="{{$genre->id}}">{{$genre['name']}}</label>
                    </div>
                @endforeach
            </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success px-5 fw-semibold fs-5">Save Content</button>
            </div>
        </form>
    </div>
@endsection