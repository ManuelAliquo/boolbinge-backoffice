@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="d-flex gap-3 my-4 justify-content-center align-items-center">
        <i class="btn btn-outline-dark disabled bi bi-pencil-square px-2 py-1"></i>
        <h1 class="">Dashboard</h1>
        <i class="btn btn-outline-dark disabled bi bi-trash3 px-2 py-1"></i>
    </div>
    <div class="dashboard-panel m-auto">
        <!-- contents  -->
        <div class="py-1 border-bottom border-top">
            <h2 class="text-center text-secondary mb-3">Contents</h2>
            <div class="row g-3 mb-3 mb-md-4">
                <div class="col-12 col-sm-6">
                    <div class="d-flex flex-column">
                        <a class="btn btn-primary fs-5 fs-md-4 fw-semibold"
                        href="{{route('contents.index')}}">Contents Index</a>
                        <small class="text-center text-muted mt-1">view all contents</small>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="d-flex flex-column">
                        <a class="btn btn-success fs-5 fs-md-4 fw-semibold"
                        href="{{route('contents.create')}}">Add Content</a>
                        <small class="text-center text-muted mt-1">add new content</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- genres  -->
        <div class="py-2 border-bottom border-top">
            <h2 class="text-center text-secondary mb-3">Genres</h2>
            <div class="row g-3 mb-3 mb-md-4">
                <div class="col-12 col-sm-6">
                    <div class="d-flex flex-column">
                        <a class="btn btn-primary fs-5 fs-md-4 fw-semibold"
                        href="{{route('genres.index')}}">Genres Index</a>
                        <small class="text-center text-muted mt-1">view all genres</small>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="d-flex flex-column">
                        <a class="btn btn-success fs-5 fs-md-4 fw-semibold"
                        href="{{route('genres.create')}}">Add Genre</a>
                        <small class="text-center text-muted mt-1">add new genre</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- performers -->
        <div class="py-2 border-bottom border-top">
            <h2 class="text-center text-secondary mb-3">Performers</h2>
            <div class="row g-3">
                <div class="col-12 col-sm-6">
                    <div class="d-flex flex-column">
                        <a class="btn btn-primary fs-5 fs-md-4 fw-semibold"
                        href="{{route('performers.index')}}">Performers Index</a>
                        <small class="text-center text-muted mt-1">view all performers</small>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="d-flex flex-column">
                        <a class="btn btn-success fs-5 fs-md-4 fw-semibold"
                        href="{{route('performers.create')}}">Add Performer</a>
                        <small class="text-center text-muted mt-1">add new performer</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection