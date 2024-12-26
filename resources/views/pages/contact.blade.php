@extends('layouts.app')

@section('title', 'İletişim')

@section('content')
    <div id="content">
        <div class="container py-4">
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">İletişim Bilgileri</h5>
                            @if($contactInfo)
                                <div class="mb-3">
                                    <p class="mb-2"><strong>Adres:</strong><br>{{ $contactInfo->address }}</p>
                                    <p class="mb-0"><strong>Telefon:</strong><br>{{ $contactInfo->phone }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">İletişim Formu</h5>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('contact.store') }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Ad Soyad</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-posta</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Mesaj</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Gönder</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Konum</h5>
                            @if($contactInfo && $contactInfo->latitude && $contactInfo->longitude)
                                <iframe id="map" width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox={{ $contactInfo->longitude - 0.002 }}%2C{{ $contactInfo->latitude - 0.002 }}%2C{{ $contactInfo->longitude + 0.002 }}%2C{{ $contactInfo->latitude + 0.002 }}&amp;layer=mapnik&amp;marker={{ $contactInfo->latitude }}%2C{{ $contactInfo->longitude }}"></iframe>
                                <br/>
                                <small>
                                    <a href="https://www.openstreetmap.org/?mlat={{ $contactInfo->latitude }}&amp;mlon={{ $contactInfo->longitude }}#map=16/{{ $contactInfo->latitude }}/{{ $contactInfo->longitude }}" target="_blank">Büyük haritada görüntüle</a>
                                </small>
                            @else
                                <div class="alert alert-info">Konum bilgisi bulunamadı.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
