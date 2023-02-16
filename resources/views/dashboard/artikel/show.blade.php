@extends('dashboard.kerangka')
@section('tittle','HIMTI - UMT | Artikel')
@section('artikel','active')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Detail Artikel <br> {{$artikel->tittle}}</h2>
                    <hr>
                    <a href="{{ route('artikel.index')}}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>Tittle</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $artikel->tittle }}</td>
                            <td>{{ $artikel->deskripsi }}</td>
                            <td>{{ $artikel->kategori->nama_kategori }}</td>
                            <td>
                                <img src="{{ Storage::url($artikel->image) }}" alt="gambar" width="150px" class="tumbnail img-fluid">
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
