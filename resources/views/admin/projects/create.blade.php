@extends('layouts.admin')

@section('content')
    <h2>Aggiungi un nuovo progetto</h2>

    @include('partials.errors')

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="type">Tipologia</label>
            <select class="form-select" id="type" name="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                    <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <h5>Tecnologie</h5>
            @foreach ($technologies as $technology)
                <div class="form-check">
                    {{-- L'input deve essere selezionato se id del tag è contenuto nell'array old(['tags'])--}}
                    <input class="form-check-input" name="technologies[]" type="checkbox" value="{{ $technology->id }}"
                        id="technology-{{ $technology->id }}" @checked(in_array($technology->id, old('technologies',[])))>
                    <label class="form-check-label" for="technology-{{ $technology->id }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="my-4">
            <label for="content" class="form-label">Contentuto</label>
            <textarea class="form-control" id="content" rows="3" name="content">{{ old('content') }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
@endsection