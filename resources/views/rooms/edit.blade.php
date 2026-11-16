@extends('rooms.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Edit Data Ruangan</h5>
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

        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" value="{{ old('nama_ruangan', $room->nama_ruangan) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kapasitas (Orang)</label>
                <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas', $room->kapasitas) }}" min="1" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $room->deskripsi) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="tersedia" {{ old('status', $room->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="penuh" {{ old('status', $room->status) == 'penuh' ? 'selected' : '' }}>Penuh</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection