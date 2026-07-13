@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="d-flex gap-3 my-4 justify-content-center align-items-center">
        <i class="bi bi-pencil-square btn btn-outline-dark disabled px-2 py-1"></i>
        <h1>Dashboard</h1>
        <i class="bi bi-trash3 btn btn-outline-dark disabled px-2 py-1"></i>
    </div>
    <div class="dashboard-panel m-auto">
        <!-- contents  -->
        <div class="py-1 border-bottom border-top">
            <h2 class="text-center text-secondary mb-3">Content</h2>
            <div class="row g-3 mb-3 mb-md-4">
                <div class="col-12 col-sm-6">
                    <div class="d-flex flex-column">
                        <a class="btn btn-primary fs-5 fs-md-4 fw-semibold"
                        href="{{route('contents.index')}}">Content List</a>
                        <div class="d-flex justify-content-center">
                            <small class="text-center text-muted card px-3 border-top-0 rounded-top-0">
                                view all contents</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="d-flex flex-column">
                        <a class="btn btn-success fs-5 fs-md-4 fw-semibold"
                        href="{{route('contents.create')}}">New Content</a>
                        <div class="d-flex justify-content-center">
                            <small class="text-center text-muted card px-3 border-top-0 rounded-top-0">
                                add new content</small>
                        </div>
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
                        href="{{route('genres.index')}}">Genres List</a>
                        <div class="d-flex justify-content-center">
                            <small class="text-center text-muted card px-3 border-top-0 rounded-top-0">
                                view all genres</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="d-flex flex-column">
                        <a class="btn btn-success fs-5 fs-md-4 fw-semibold"
                        href="{{route('genres.create')}}">New Genre</a>
                        <div class="d-flex justify-content-center">
                            <small class="text-center text-muted card px-3 border-top-0 rounded-top-0">
                                add new genre</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- performers -->
        <div class="py-2 border-bottom border-top">
            <h2 class="text-center text-secondary mb-3">Performers</h2>
            <div class="row g-3 mb-3 mb-md-4">
                <div class="col-12 col-sm-6">
                    <div class="d-flex flex-column">
                        <a class="btn btn-primary fs-5 fs-md-4 fw-semibold"
                        href="{{route('performers.index')}}">Performers List</a>
                        <div class="d-flex justify-content-center">
                            <small class="text-center text-muted card px-3 border-top-0 rounded-top-0">
                                view all performers</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="d-flex flex-column">
                        <a class="btn btn-success fs-5 fs-md-4 fw-semibold"
                        href="{{route('performers.create')}}">New Performer</a>
                        <div class="d-flex justify-content-center">
                            <small class="text-center text-muted card px-3 border-top-0 rounded-top-0">
                                add new performer</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection