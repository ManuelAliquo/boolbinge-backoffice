@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="d-flex gap-3 align-items-center ms-1 mb-3">
            <h2 class="text-secondary mb-1">Edit Performer</h2>
            <a class="btn btn-outline-dark" href="{{route('performers.index')}}">
                <i class="bi bi-arrow-left-circle"></i> Back</a>
        </div>
        <form class="card p-3 shadow-sm" action="{{route('performers.update', $performer)}}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            {{-- submit --}}
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success px-5 fw-semibold fs-5 shadow-sm">Save Performer</button>
            </div>
        </form>
    </div>
@endsection