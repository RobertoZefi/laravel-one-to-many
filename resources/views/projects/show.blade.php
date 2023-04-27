@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-center my-5">
            <p>Titolo: {{ $project->title }}</p>
            <p>Cliente: {{ $project->client }}</p>
            <p>Descrizione: {{ $project->description }}</p>
            @if ($project->type)
            <p>Tipo: {{ $project->type->type }}</p>
            @else
            <p>Nessun tipo</p>
            @endif
            
        </div>
    </div>
@endsection