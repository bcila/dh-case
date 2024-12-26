@extends('layouts.app')

@section('title', 'Portfolyo Düzenle')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>Portfolyo Düzenle</h2>
                        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Geri Dön</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.portfolio.update', $portfolio) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Başlık</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{ old('title', $portfolio->title) }}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Açıklama</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="5">{{ old('description', $portfolio->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Tür</label>
                                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                    <option value="">Seçiniz</option>
                                    <option value="school" {{ old('type', $portfolio->type) === 'school' ? 'selected' : '' }}>Okul</option>
                                    <option value="project" {{ old('type', $portfolio->type) === 'project' ? 'selected' : '' }}>Proje</option>
                                </select>
                                @error('type')
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
