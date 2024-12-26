@extends('layouts.app')

@section('title', 'Ana Sayfa')

@section('content')
    <div class="container">
        <h1>Site Haritası</h1>

        <div class="row mt-4">
            <!-- Hakkımda -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Hakkımda</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>Özgeçmişim</li>
                            <li>Hobilerim</li>
                            <li>Fobilerim</li>
                        </ul>
                        <a href="{{ route('about') }}" class="btn btn-primary">Git</a>
                    </div>
                </div>
            </div>

            <!-- Portfolyo -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Portfolyo</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>Bitirdiğim Okullar</li>
                            <li>Bitirdiğim Projeler</li>
                        </ul>
                        <a href="{{ route('portfolio') }}" class="btn btn-primary">Git</a>
                    </div>
                </div>
            </div>

            <!-- İletişim -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h2>İletişim</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>Harita ve Adres</li>
                            <li>Telefon</li>
                            <li>İletişim Formu</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-primary">Git</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
