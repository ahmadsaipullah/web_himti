@extends('dashboard.kerangka')
@section('tittle', 'HIMTI - UMT | Acara')
@section('acara', 'active')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Detail Acara <br> {{ $acara->tittle }}</h2>
                    <hr>
                    <a href="{{ route('acara.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>Tittle</th>
                                <th>Deskripsi</th>
                                <th>Image</th>
                                <th>Jadwal</th>
                                <th>Pengisi Acara</th>
                                <th>Lokasi</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $acara->tittle }}</td>
                                <td>{{ $acara->deskripsi }}</td>
                                <td>{{ $acara->jadwal }}</td>
                                <td>{{ $acara->pengisi_acra }}</td>
                                <td>{{ $acara->lokasi }}</td>
                                <td>{{ $acara->kategori->nama_kategori }}</td>
                                <td>
                                    <img src="{{ Storage::url($acara->image) }}" alt="gambar" width="150px"
                                        class="tumbnail img-fluid">
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
