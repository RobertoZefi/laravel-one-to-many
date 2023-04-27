@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center py-5">
            <h1>Tutti i progetti</h1>
            <div class="ms-auto">
                <a class="btn btn-primary" href="{{ route('projects.create') }}">Aggiungi</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Cliente</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Tipo</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td> <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></td>
                    <td>{{ $project->client }}</td>
                    <td>{{ $project->description }}</td>
                    @if ($project->type)
                        <td>{{ $project->type->type }}</td>  
                    @else 
                        <td></td>
                    @endif
                    <td><a class="btn btn-primary btn-sm" href="{{ route('projects.edit', $project) }}">Modifica</a></td> 
                    <td>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger btn-sm" type="submit" value="Elimina">
                        </form>
                    </td> 
                    
                </tr>
            @endforeach
            </tbody>
          </table>
    </div>
@endsection