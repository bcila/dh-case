@extends('layouts.app')

@section('title', 'Hakkımda')

@section('content')
    <div id="content">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1 class="mb-4">Hakkımda</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>Özgeçmişim</h2>
                        </div>
                        <div class="card-body">
                            <p>{{ strip_tags($about->biography) }}</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>Hobilerim</h2>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex flex-wrap">
                                @foreach($about->hobbies as $hobby)
                                    <li class="me-3 mb-2">
                                        <span class="badge bg-primary">{{ $hobby }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>Fobilerim</h2>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex flex-wrap">
                                @foreach($about->phobias as $phobia)
                                    <li class="me-3 mb-2">
                                        <span class="badge bg-danger">{{ $phobia }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
