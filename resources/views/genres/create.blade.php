@extends('layouts.app')

@section('content')
    <div class="container my-4">
        {{-- errors --}}
        @if ($errors->any())
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger">
                    <ul class="list-unstyled mb-0">
                        @foreach ($errors->all() as $error)
                            <li class="d-flex gap-2">
                                <i class="bi bi-exclamation-triangle"></i> {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        {{-- form --}}
        <div class="d-flex gap-3 align-items-center ms-1 mb-3">
            <h2 class="text-secondary mb-1">Edit Genre</h2>
            <a class="btn btn-outline-dark" href="{{route('genres.index')}}">
                <i class="bi bi-arrow-left-circle"></i> Back</a>
        </div>
        <form class="card p-3" action="{{route('genres.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label ms-1 fs-5" for="genre-name">Name</label>
                <input class="form-control" type="text" name="name" id="genre-name"
                placeholder="Insert Genre Name" required>
            </div>
            <div class="mb-4">
                <label class="form-label ms-1 fs-5" for="genre-description">Description</label>
                <textarea class="form-control" name="description" id="genre-description" placeholder="Insert Genre Description"></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success px-5 fw-semibold fs-5">Add Genre</button>
            </div>
        </form>
    </div>
@endsection
