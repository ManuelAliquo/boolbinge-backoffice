@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <form class="card p-3" action="{{route('contents.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fs-5" for="content-type">Type</label>
                <select class="form-select" name="type" required>
                    <option selected value="">Select Content Type</option>
                    @foreach ($types as $type)
                    <option value="{{$type}}">{{ucfirst($type)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fs-5" for="content-title">Title</label>
                <input class="form-control" id="content-title" name="title"
                type="text" placeholder="Insert Content Title" required>
            </div>
            <div class="mb-3">
                <label class="form-label fs-5" for="content-year">Release Year</label>
                <input class="form-control" id="content-year" name="release_year" type="number"
                 placeholder="Insert Release Year" min="1900" max="2030" required>
            </div>
            <div class="mb-2">
                <label class="form-label fs-5" for="content-description">Description</label>
                <textarea class="form-control" id="content-description" name="description"
                placeholder="Insert Content Description" required></textarea>
            </div>
            <div class="mb-2">
                <label class="form-label fs-5" for="content-image">Cover Image</label>
                <input class="form-control" type="file" id="content-image" name="cover_image">
            </div>
            <div class="mb-4">
                <label class="form-label">Genres</label>
                <div class="d-flex gap-3 flex-wrap mb-3">
                @foreach ($genres as $genre)
                    <div class="form-check">
                        <input class="form-check-input" id="{{$genre->id}}" name="genres[]"
                        value="{{$genre->id}}" type="checkbox">
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