@extends('dashboard.kerangka')
@section('tittle', 'HIMTI - UMT | Jadwal Sharing')
@section('jadwalSharing', 'active')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Detail Jadwal Sharing <br> {{ $jadwal_sharing->tittle }}</h2>
                    <hr>
                    <a href="{{ route('jadwal-sharing.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>Tittle</th>
                                <th>Deskripsi</th>
                                <th>Jadwal</th>
                                <th>Pemateri</th>
                                <th>Ruangan</th>
                                <th>Kategori</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $jadwal_sharing->tittle }}</td>
                                <td>{{ $jadwal_sharing->deskripsi }}</td>
                                <td>{{ $jadwal_sharing->jadwal }}</td>
                                <td>{{ $jadwal_sharing->pemateri }}</td>
                                <td>{{ $jadwal_sharing->ruangan }}</td>
                                <td>{{ $jadwal_sharing->kategori->nama_kategori }}</td>
                                <td>
                                    <img src="{{ Storage::url($jadwal_sharing->image) }}" alt="gambar" width="150px"
                                        class="tumbnail img-fluid">
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
