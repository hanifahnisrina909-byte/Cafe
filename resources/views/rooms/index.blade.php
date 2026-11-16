@extends('rooms.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Ruangan Restoran</h5>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary btn-sm">+ Tambah Ruangan</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Ruangan</th>
                        <th>Kapasitas</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rooms as $room)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $room->nama_ruangan }}</strong></td>
                        <td>{{ $room->kapasitas }} Orang</td>
                        <td>{{ $room->deskripsi ?? '-' }}</td>
                        <td>
                            @if ($room->status == 'tersedia')
                                <span class="badge bg-success">Tersedia</span>
                            @else
                                <span class="badge bg-danger">Penuh</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus ruangan ini?')">
                                <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data ruangan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection