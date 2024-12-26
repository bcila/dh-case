@extends('layouts.app')

@section('title', 'Mesaj Detayı')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>Mesaj Detayı</h2>
                        <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Geri Dön</a>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Gönderen:</dt>
                            <dd class="col-sm-9">{{ $message->name }}</dd>

                            <dt class="col-sm-3">E-posta:</dt>
                            <dd class="col-sm-9">{{ $message->email }}</dd>

                            <dt class="col-sm-3">Telefon:</dt>
                            <dd class="col-sm-9">{{ $message->phone ?? '-' }}</dd>

                            <dt class="col-sm-3">Tarih:</dt>
                            <dd class="col-sm-9">{{ $message->created_at->format('d.m.Y H:i') }}</dd>

                            <dt class="col-sm-3">Mesaj:</dt>
                            <dd class="col-sm-9">{{ $message->message }}</dd>
                        </dl>

                        <div class="mt-4">
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bu mesajı silmek istediğinize emin misiniz?')">
                                    Mesajı Sil
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
