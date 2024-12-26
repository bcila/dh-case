@extends('layouts.app')

@section('title', 'Portfolyo Yönetimi')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>Portfolyo Yönetimi</h2>
                        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">Yeni Ekle</a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Başlık</th>
                                    <th>Açıklama</th>
                                    <th>Tür</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($portfolios as $portfolio)
                                    <tr>
                                        <td>{{ $portfolio->title }}</td>
                                        <td>{{ Str::limit($portfolio->description, 100) }}</td>
                                        <td>{{ $portfolio->type === 'school' ? 'Okul' : 'Proje' }}</td>
                                        <td>
                                            <a href="{{ route('admin.portfolio.edit', $portfolio) }}"
                                               class="btn btn-sm btn-primary">Düzenle</a>
                                            <form action="{{ route('admin.portfolio.destroy', $portfolio) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Bu portfolyo öğesini silmek istediğinize emin misiniz?')">
                                                    Sil
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Henüz portfolyo öğesi yok.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $portfolios->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
