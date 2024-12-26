@extends('layouts.app')

@section('title', 'Portfolyo')

@section('content')
    <div id="content">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1 class="mb-4">Portfolyo</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>Bitirdiğim Okullar</h2>
                        </div>
                        <div class="card-body">
                            @if($schools->isEmpty())
                                <p>Henüz okul bilgisi eklenmemiş.</p>
                            @else
                                <ul class="list-unstyled">
                                    @foreach($schools as $school)
                                        <li class="mb-2">
                                            <span class="badge bg-info">{{ $school->title }}</span>
                                            <p class="text-muted">{{ $school->description }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>Bitirdiğim Projeler</h2>
                        </div>
                        <div class="card-body">
                            @if($projects->isEmpty())
                                <p>Henüz proje bilgisi eklenmemiş.</p>
                            @else
                                <ul class="list-unstyled">
                                    @foreach($projects as $project)
                                        <li class="mb-2">
                                            <span class="badge bg-success">{{ $project->title }}</span>
                                            <p class="text-muted">{{ $project->description }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
