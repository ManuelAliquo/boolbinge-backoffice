@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h2 class="text-secondary ms-1 mb-3">New Content</h2>
        <form class="card p-3" action="{{route('contents.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- type - production --}}
            <div class="row mb-3 g-3">
                <div class="col-12 col-sm-6">
                    <label class="form-label ms-1 fs-5" for="content-type">Type</label>
                    <select id="content-type" class="form-select" name="type" required>
                        <option selected value="">Select Content Type</option>
                        @foreach ($types as $type)
                        <option value="{{$type}}">{{ucfirst($type)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6">
                    <label class="form-label ms-1 fs-5" for="content-production">Production</label>
                    <input class="form-control" type="text" name="production" id="content-production"
                    placeholder="Director / Network / Studio">
                </div>
            </div>
            {{-- title - length --}}
            <div class="row mb-3 g-3">
                <div class="col-12 col-sm-8">
                    <label class="form-label ms-1 fs-5" for="content-title">Title</label>
                    <input class="form-control" id="content-title" name="title"
                    type="text" placeholder="Insert Content Title" required>
                </div>
                <div class="col-12 col-sm-4">
                    <label class="form-label ms-1 fs-5" for="content-length">Lenght</label>
                    <input class="form-control" id="content-length" name="length"
                    type="text" placeholder="(x)h (x)min / (x) episodes">
                </div>
            </div>
            {{-- year - rating --}}
            <div class="row mb-3 g-3">
                <div class="col-12 col-sm-6">
                    <label class="form-label ms-1 fs-5" for="content-year">Release Year</label>
                    <input class="form-control" id="content-year" name="release_year" type="number"
                     placeholder="Insert Release Year" min="1900" max="2030" required>
                </div>
                <div class="col-12 col-sm-6">
                    <label class="form-label ms-1 fs-5" for="content-rating">Rating</label>
                    <input class="form-control" id="content-rating" name="rating" type="number"
                    placeholder="Insert Rating" min="0" max="10" step="0.1">
                </div>
            </div>
            {{-- description --}}
            <div class="mb-2">
                <label class="form-label ms-1 fs-5" for="content-description">Description</label>
                <textarea class="form-control" id="content-description" name="description"
                placeholder="Insert Content Description"></textarea>
            </div>
            {{-- img --}}
            <div class="mb-3">
                <label class="form-label ms-1 fs-5" for="content-image">Cover Image</label>
                <input class="form-control" type="file" id="content-image" name="cover_image">
            </div>
            {{-- genres --}}
            <div class="mb-4">
                <label class="form-label ms-1 fs-5">Genres</label>
                <div class="d-flex gap-3 flex-wrap mb-3 px-1">
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
                <button type="submit" class="btn btn-success px-5 fw-semibold fs-5">Add Content</button>
            </div>
        </form>
    </div>
@endsection