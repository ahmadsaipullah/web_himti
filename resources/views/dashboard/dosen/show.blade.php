@extends('dashboard.kerangka')
@section('tittle', 'HIMTI - UMT | Dosen')
@section('dosen', 'active')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Detail Dosen <br> {{ $dosen->nama }}</h2>
                    <hr>
                    <a href="{{ route('dosen.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No_Hp</th>
                                <th>Mata Kuliah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $dosen->nidn }}</td>
                                <td>{{ $dosen->nama }}</td>
                                <td>{{ $dosen->email }}</td>
                                <td>{{ $dosen->no_hp }}</td>
                                <td>{{ $dosen->matakuliah }}</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
