@extends('layouts.app')

@section('content')
<div class="container my-5">
    @foreach ($contents as $content)
    <ul class="list-unstyled">
        <li><b>{{$content->title}}</b> - {{$content->release_year}}</li>
        <li>{{$content->description}}</li>
    </ul>
    @endforeach
</div>
@endsection