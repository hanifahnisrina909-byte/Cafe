@extends('rooms.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Tambah Ruangan Baru</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rooms.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" value="{{ old('nama_ruangan') }}" placeholder="Contoh: VIP Room Anggrek" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kapasitas (Orang)</label>
                <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas') }}" min="1" placeholder="Contoh: 10" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Fasilitas ruangan (AC, Karaoke, Private Toilet, dll)">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="penuh" {{ old('status') == 'penuh' ? 'selected' : '' }}>Penuh</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection