@extends('layouts.app')

@section('content')
<div class="container my-5">
    <a href="{{route('contents.create')}}">Add Content</a>

    {{-- movies --}}
    <div class="border-bottom pb-3 mt-4">
        <h3 class="text-secondary ms-1">Movies</h3>
        @foreach ($contents as $content)
            @if ($content->type === 'movie')
            <div class="card p-3 mb-2">
                <div><b>{{$content->title}}</b> - {{$content->release_year}}</div>
                <div>{{$content->description}}</div>
            </div class="card p-3 mb-2">
            @endif
        @endforeach
    </div>
    
    {{-- shows --}}
    <div class="border-bottom pb-3 mt-3">
        <h3 class="text-secondary ms-1">Shows</h3>
        @foreach ($contents as $content)
            @if ($content->type === 'show')
            <div class="card p-3 mb-2">
                <div><b>{{$content->title}}</b> - {{$content->release_year}}</div>
                <div>{{$content->description}}</div>
            </div class="card p-3 mb-2">
            @endif
        @endforeach
    </div>
    
    {{-- anime --}}
    <div class="mt-3">
        <h3 class="text-secondary ms-1">Anime</h3>
        @foreach ($contents as $content)
            @if ($content->type === 'anime')
            <div class="card p-3 mb-2">
                <div><b>{{$content->title}}</b> - {{$content->release_year}}</div>
                <div>{{$content->description}}</div>
            </div class="card p-3 mb-2">
            @endif
        @endforeach
    </div>
</div>
@endsection