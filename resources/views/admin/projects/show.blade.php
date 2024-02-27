@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card text-center card-show">
                    <div class="card-header bg-danger">
                        <h1>Project</h1>
                    </div>
                    <div class="card-img">
                        @if ($project->cover_image != null)
                            <div class="my-3">
                                <img src="{{ asset('/storage/' . $project->cover_image) }}" alt="{{ $project->titolo }}">
                            </div>
                        @else
                            <img src="{{ asset('/img/folder.png') }}" alt="{{ $project->titolo }}">
                        @endif

                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Titolo: {{ $project->titolo }}</h3>
                        <p class="card-text">{{ $project->descrizione }}</p>
                        <div class="d-flex justify-content-around">
                            <h5>Autore: {{ $project->autore }}</h5>
                            <h6> {{ $project->type_id ? $project->type->nome : 'Nessuna categoria' }}
                            </h6>
                            <h5>Data fine progetto: {{ $project->fine_progetto }}</h5>
                        </div>

                        <div class="d-flex justify-content-around mt-5">
                            <a href="{{ route('admin.projects.edit', $project->id) }}"
                                class="btn btn-warning  float-start">Modifica
                                Progetto</a>
                            <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary float-end">Torna ai
                                post</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
