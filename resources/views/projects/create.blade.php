@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-5">Aggiungi progetto</h2>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1" name="title">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cliente</label>
                <input type="text" class="form-control @error('client') is-invalid @enderror" id="exampleFormControlInput1" name="client">
                @error('client')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Descrizione</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="exampleFormControlInput1" name="description">
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Crea">
        </form>
    </div>
@endsection