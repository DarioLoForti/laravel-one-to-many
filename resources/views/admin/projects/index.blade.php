@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col 12 d-flex">
                <div class="col-2">
                    <div class="container-fluid">
                        <div class="row flex-nowrap">
                            <div class="col-12 px-sm-2 px-0 bg-dark">
                                <div
                                    class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                                    <a href="/"
                                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                                    </a>
                                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                                        id="menu">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link align-middle px-0">
                                                <i class="fs-4 bi-house"></i> <span
                                                    class="ms-1 d-none d-sm-inline">Home</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.dashboard') }}" class="nav-link px-0">
                                                <span class="d-none d-sm-inline">Dashboard</span></a>
                                        <li class="w-100">
                                            <a href="{{ route('admin.projects.index') }}" class="nav-link px-0">
                                                <span class="d-none d-sm-inline">Project</span></a>
                                        </li>
                                        <li class="w-100">
                                            <a href="{{ route('admin.projects.create') }}" class="nav-link px-0">
                                                <span class="d-none d-sm-inline">Create New Project</span></a>
                                        </li>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="dropdown pb-4">
                                        <a href="#"
                                            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30"
                                                height="30" class="rounded-circle">
                                            <span class="d-none d-sm-inline mx-1">loser</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                            <li><a class="dropdown-item" href="#">New project...</a></li>
                                            <li><a class="dropdown-item" href="#">Settings</a></li>
                                            <li><a class="dropdown-item" href="#">Profile</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center text-white mt-3">Portfolio</h2>
                            </div>
                            <div class="row">
                                @foreach ($projects as $project)
                                    <div class="col-2 py-5">
                                        <div class="card text-center">
                                            @if ($project->cover_image != null)
                                                <div class="my-3">
                                                    <img src="{{ asset('/storage/' . $project->cover_image) }}"
                                                        alt="{{ $project->titolo }}">
                                                </div>
                                            @else
                                                <img src="{{ asset('/img/folder.png') }}" alt="{{ $project->titolo }}">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $project->titolo }}</h5>
                                                <h6> {{ $project->type_id ? $project->type->nome : 'Nessuna categoria' }}
                                                </h6>
                                                <p class="card-text">{{ Str::limit($project->descrizione, 30, '...') }}</p>
                                                <div class="d-flex mt-4">
                                                    <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}"
                                                        class="btn btn-sm btn-primary">Dettagli</a>
                                                    <a href="{{ route('admin.projects.edit', $project->id) }}"
                                                        class="btn btn-sm btn-warning ms-2">Modifica</a>
                                                </div>
                                                {{-- <form
                                                    action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                                    method="post"
                                                    onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger mt-3">Elimina</button>
                                                </form> --}}
                                                <button class="btn btn-sm btn-danger mt-3" data-bs-toggle="modal"
                                                    data-bs-target="#modal_delete_{{ $project->id }}">Elimina</button>
                                                @include('admin.projects.modal')
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
