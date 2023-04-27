@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-5">Modifica progetto</h2>
        <form action="{{ route('projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1" name="title" value="{{ old('title', $project['title'] )}}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cliente</label>
                <input type="text" class="form-control @error('client') is-invalid @enderror" id="exampleFormControlInput1" name="client" value="{{ old('client', $project['client'] )}}">
                @error('client')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Descrizione</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="exampleFormControlInput1" name="description" value="{{ old('description', $project['description'] )}}">
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" id="type" class="form-label">Tipo</label>
                <select class="form-select" id="type" aria-label="Default select example" name="type_id">
                    <option value="" selected>Segli il tipo</option>
                    @foreach($types as $type)
    
                    <option @selected(old('type_id', $project->type_id) ==  $type->id) value="{{ $type->id }}">{{ $type->type }}</option>
                    
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary ms-auto" value="Modifica">
        </form>
    </div>
@endsection