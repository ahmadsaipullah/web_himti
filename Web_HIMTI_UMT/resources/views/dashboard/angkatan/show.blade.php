@extends('dashboard.kerangka')
@section('tittle','HIMTI - UMT | Angkatan')
@section('angkatan','active')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Detail Angkatan <br> {{$angkatan->angkatan}}</h2>
                    <hr>
                    <a href="{{ route('angkatan.index')}}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th>Angkatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $angkatan->angkatan }}</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
