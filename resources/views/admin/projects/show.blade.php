@extends('layouts.admin')


@section('content')
    <h1 class="text-center">{{ $project->title }}</h1>
    <div class="my-4">
        <h6>Categoria:</h6>
        @if ($project->type)
            <span>{{ $project->type->name }}</span>
        @else
            <span>Nessuna categoria</span>
        @endif
        <span>{{ $project->slug }}</span>
    </div>
    <div>
        <h6>Tecnologia:</h6>
        @forelse ($project->technologies as $technology)
            <span> {{ $technology->name }} {{ $loop->last ? '' : ','}}</span>
        @empty
            <span>Nessuna Tecnologia presente</span>
        @endforelse
    </div>
    <p class="mt-4">{{ $project->content }}</p>

    <a class="btn btn-outline-success" href="{{ url()->previous() }}">Back</a>
@endsection