@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-secondary mt-4 mb-5">Dashboard</h1>
    <div class="dashboard-panel m-auto">
        <div class="d-flex gap-3 mb-4">
            <div class="d-flex flex-column flex-grow-1">
                <a class="fs-4 btn btn-primary px-4 fw-semibold" href="{{route('contents.index')}}">Contents Index</a>
                <small class="text-center text-muted">view all contents</small>
            </div>
            <div class="d-flex flex-column flex-grow-1">
                <a class="fs-4 btn btn-success px-4 fw-semibold" href="{{route('contents.create')}}">Add Content</a>
                <small class="text-center text-muted">add new content</small>
            </div>
        </div>
        <div class="d-flex gap-3">
            <div class="d-flex flex-column flex-grow-1">
                <a class="fs-4 btn btn-warning px-4 fw-semibold" href="{{route('genres.index')}}">Genres Index</a>
                <small class="text-center text-muted">view all genres</small>
            </div>
            <div class="d-flex flex-column flex-grow-1">
                <a class="fs-4 btn btn-info px-4 fw-semibold" href="{{route('genres.create')}}">Add Genre</a>
                <small class="text-center text-muted">add new genre</small>
            </div>
        </div>
    </div>
</div>
@endsection
