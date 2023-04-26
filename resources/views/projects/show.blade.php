@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-center my-5">
            <p>Titolo: {{ $project->title }}</p>
            <p>Cliente: {{ $project->client }}</p>
            <p>Descrizione: {{ $project->description }}</p>
        </div>
    </div>
@endsection