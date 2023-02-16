@extends('dashboard.kerangka')
@section('tittle','HIMTI - UMT | Anggota')
@section('anggota','active')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Detail Anggota <br> {{$anggotum->nama}}</h2>
                    <hr>
                    <a href="{{ route('anggota.index')}}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>No_Hp</th>
                            <th>Email</th>
                            <th>Id_Angkatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $anggotum->nama }}</td>
                            <td>{{ $anggotum->nim }}</td>
                            <td>{{ $anggotum->no_hp }}</td>
                            <td>{{ $anggotum->email }}</td>
                            <td>{{ $anggotum->angkatan->angkatan }}</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
