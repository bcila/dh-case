@extends('layouts.app')

@section('title', 'İletişim Bilgilerini Düzenle')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>İletişim Bilgilerini Düzenle</h2>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.contact.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="address" class="form-label">Adres</label>
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                          id="address" name="address" rows="3">{{ old('address', $contactInfo->address ?? '') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefon</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                       id="phone" name="phone" value="{{ old('phone', $contactInfo->phone ?? '') }}"
                                       placeholder="0(xxx) 123 xx xx">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="latitude" class="form-label">Enlem</label>
                                <input type="number" step="any" class="form-control @error('latitude') is-invalid @enderror"
                                       id="latitude" name="latitude" value="{{ old('latitude', $contactInfo->latitude ?? '') }}">
                                @error('latitude')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="longitude" class="form-label">Boylam</label>
                                <input type="number" step="any" class="form-control @error('longitude') is-invalid @enderror"
                                       id="longitude" name="longitude" value="{{ old('longitude', $contactInfo->longitude ?? '') }}">
                                @error('longitude')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
