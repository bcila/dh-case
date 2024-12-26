@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Admin Dashboard</h1>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Portfolyo</h5>
                                <p class="card-text">Toplam: {{ \App\Models\Portfolio::count() }}</p>
                                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-primary">Portfolyo
                                    Yönetimi</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Hakkımda</h5>
                                @php
                                    $about = \App\Models\AboutMe::first();
                                    $hobbiesCount = $about ? count($about->hobbies ?? []) : 0;
                                    $phobiasCount = $about ? count($about->phobias ?? []) : 0;
                                @endphp
                                <p class="card-text mb-1">Hobiler: {{ $hobbiesCount }}</p>
                                <p class="card-text">Fobiler: {{ $phobiasCount }}</p>
                                <a href="{{ route('admin.about.edit') }}" class="btn btn-primary">Hakkımda Sayfasını
                                    Düzenle</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Mesajlar</h5>
                                <p class="card-text">Toplam: {{ \App\Models\ContactMessage::count() }}</p>
                                <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">Mesajları
                                    Görüntüle</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">İletişim Bilgileri</h5>
                                <a href="{{ route('admin.contact.edit') }}" class="btn btn-primary">İletişim Bilgilerini
                                    Düzenle</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
