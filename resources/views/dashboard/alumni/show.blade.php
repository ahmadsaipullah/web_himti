@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Alumni')
@section('alumni', 'active')
@section('content')
    @include('sweetalert::alert')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2 class="text-center">Detail Alumni</h2>
                    <hr>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>perusahaan</th>
                                <th>title</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $alumnus->id }}</td>
                                <td>{{ $alumnus->nama }}</td>
                                <td>{{ $alumnus->perusahaan }}</td>
                                <td>{{ $alumnus->title }}</td>
                                <td><img src="{{ Storage::url($alumnus->image) }}" alt="gambar" width="150px"
                                        class="tumbnail img-fluid"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
