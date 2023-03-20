@extends('dashboard.kerangka')
@section('tittle', 'HIMTI - UMT | Struktural')
@section('struktural', 'active')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Detail Struktural <br> {{ $struktural->nama }}</h2>
                    <hr>
                    <a href="{{ route('struktural.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nim</th>
                                <th>Jabatan</th>
                                <th>Angkatan</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Instagram</th>
                                <th>Twitter</th>
                                <th>Facebook</th>
                                <th>Linkedin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $struktural->nama }}</td>
                                <td>{{ $struktural->nim }}</td>
                                <td>{{ $struktural->jabatan }}</td>
                                <td>{{ $struktural->angkatan->angkatan }}</td>
                                <td>{{ $struktural->status }}</td>
                                <td>{{ $struktural->image }}</td>
                                <td>{{ $struktural->ig }}</td>
                                <td>{{ $struktural->twitter }}</td>
                                <td>{{ $struktural->fb }}</td>
                                <td>{{ $struktural->linkedin }}</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
