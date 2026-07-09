@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-secondary my-4">Dashboard</h1>

    <div class="d-flex justify-content-center gap-3 mt-5">
        <a class="fs-4 btn btn-primary px-4" href="{{route('contents.index')}}">Contents Index</a>
        <a class="fs-4 btn btn-success px-4" href="{{route('contents.create')}}">Add Content</a>
    </div>
</div>
@endsection
