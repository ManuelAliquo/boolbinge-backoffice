@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex gap-3 align-items-center ms-1 mb-3">
        <h2 class="text-secondary mb-1">New Performer</h2>
        <a class="btn btn-outline-dark" href="{{route('performers.index')}}">
            <i class="bi bi-arrow-left-circle"></i> Back</a>
    </div>
    <form class="card p-3 shadow-sm" action="{{route('performers.store')}}"
        method="POST" enctype="multipart/form-data">
        @csrf
        {{-- name --}}
        <div class="row mb-3 g-3">
            <div class="col-12">
                <label class="form-label ms-1 fs-5" for="perfomer-name">Name</label>
                <input id="performer-name" type="text" class="form-control" name="name"
                placeholder="Insert performer's Name (Name Surname)" required>
            </div>
        </div>
        {{-- picture --}}
        <div class="mb-4">
            <label class="form-label ms-1 fs-5" for="performer-picture">Picture</label>
            <input class="form-control" type="file" id="performer-picture" name="picture">
        </div>
        {{-- submit --}}
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success px-5 fw-semibold fs-5 shadow-sm">Add Performer</button>
        </div>
    </form>
</div>
@endsection