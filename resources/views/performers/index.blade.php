@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center ms-1 mb-4 flex-wrap">
        <h2 class="text-secondary mb-1">Performers</h2>
        <div>
            <a class="btn btn-outline-dark" href="{{route('dashboard')}}">
                <i class="bi bi-arrow-left-circle"></i> Back</a>
            <a class="btn btn-success shadow-sm fw-semibold" href="{{route('performers.create')}}">
                <i class="bi bi-plus-circle me-1"></i> Add Performer</a>
        </div>
    </div>
    {{-- all performers --}}
    <div class="row g-3">
        @forelse ($performers as $performer)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border bg-white">
                    <div class="card-body d-flex flex-column justify-content-between p-3">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <div class="performer-avatar bg-light border rounded-circle text-secondary d-flex align-items-center justify-content-center shadow-sm overflow-hidden flex-shrink-0">
                                @if($performer->picture)
                                    <img src="{{$performer->picture && str_starts_with($performer->picture, 'imgs/') ? asset($performer->picture) : ($performer->picture ? asset('storage/' . $performer->picture) : asset('imgs/placeholder.png'))}}" alt="{{$performer->name}}" class="img-fluid">
                                @else
                                    <i class="bi bi-person-fill fs-5 p-2"></i>
                                @endif
                            </div>
                            <h5 class="card-title mb-0 fw-semibold">{{$performer->name}}</h5>
                        </div>
                        {{-- buttons --}}
                        <div class="d-flex justify-content-end gap-2 border-top pt-2">
                            <a class="btn btn-sm btn-outline-info" href="{{ route('performers.show', $performer) }}">
                                <i class="bi bi-info-circle"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-warning" href="{{ route('performers.edit', $performer) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" 
                                    data-bs-target="#performerDeleteModal{{ $performer->id }}">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- delete modal --}}
            <x-performer-delete-modal :performer="$performer"/>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center py-4 shadow-sm" role="alert">
                    <i class="bi bi-info-circle fs-4 d-block mb-2"></i>
                    No performers found in the database.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection