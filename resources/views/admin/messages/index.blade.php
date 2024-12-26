@extends('layouts.app')

@section('title', 'İletişim Mesajları')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>İletişim Mesajları</h2>
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
                                    <th>Tarih</th>
                                    <th>İsim</th>
                                    <th>E-posta</th>
                                    <th>Telefon</th>
                                    <th>Mesaj</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($messages as $message)
                                    <tr>
                                        <td>{{ $message->created_at->format('d.m.Y H:i') }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->phone ?? '-' }}</td>
                                        <td>{{ Str::limit($message->message, 50) }}</td>
                                        <td>
                                            <a href="{{ route('admin.messages.show', $message) }}"
                                               class="btn btn-sm btn-info">Detay</a>
                                            <form action="{{ route('admin.messages.destroy', $message) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Bu mesajı silmek istediğinize emin misiniz?')">
                                                    Sil
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Henüz mesaj yok.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
