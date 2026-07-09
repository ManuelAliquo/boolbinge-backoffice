@extends('layouts.app')

@section('content')
<div class="container my-4">
    <a class="btn btn-success fs-5" href="{{route('contents.create')}}">Add Content</a>

    {{-- movies --}}
    <div class="border-bottom pb-3 mt-4">
        <h3 class="text-secondary ms-1">Movies</h3>
        @foreach ($contents as $content)
            @if ($content->type === 'movie')
            <a href="{{route('contents.show', $content)}}">
                <x-content-section :content="$content"/>
            </a>
            @endif
        @endforeach
    </div>
    
    {{-- shows --}}
    <div class="border-bottom pb-3 mt-3">
        <h3 class="text-secondary ms-1">Shows</h3>
        @foreach ($contents as $content)
            @if ($content->type === 'show')
            <a href="{{route('contents.show', $content)}}">
                <x-content-section :content="$content"/>
            </a>
            @endif
        @endforeach
    </div>
    
    {{-- anime --}}
    <div class="mt-3">
        <h3 class="text-secondary ms-1">Anime</h3>
        @foreach ($contents as $content)
            @if ($content->type === 'anime')
            <a href="{{route('contents.show', $content)}}">
                <x-content-section :content="$content"/>
            </a>
            @endif
        @endforeach
    </div>
</div>
@endsection