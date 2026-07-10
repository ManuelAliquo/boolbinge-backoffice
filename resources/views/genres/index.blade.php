@extends('layouts.app')

@section('content')
<div class="container my-4">
    @foreach ($genres as $genre)
        <div class="mb-3 border rounded-3 p-3">
            <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                <a class="btn btn-secondary fw-semibold fs-5 flex-shrink-0" href="">{{$genre->name}}</a>
                <p class="m-0 flex-grow-1 border rounded-4 p-3">{{$genre->description}}</p>
                <div class="flex-shrink-0">
                    <a class="btn btn-warning" href=""><i class="bi bi-pencil-square"></i> Edit</a>
                    <a class="btn btn-danger" href=""><i class="bi bi-trash3"></i> Delete</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection