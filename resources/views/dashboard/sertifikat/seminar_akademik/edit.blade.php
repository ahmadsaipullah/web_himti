@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Sertifikat | Update')
@section('sertifikat', 'active')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Update Sertifikat</h1>
                <hr>
                <form action="{{ route('sertifikat.update', $sertifikat->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="nama_peserta">Nama Peserta</label>
                        <input type="text" name="nama_peserta" id="nama_peserta"
                            class="form-control @error('nama_peserta') is invalid @enderror"
                            value="{{ old('nama_peserta') ?? $sertifikat->nama_peserta }}" required>
                        @error('nama_peserta')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="number" name="nim" id="nim"
                            class="form-control @error('nim') is invalid @enderror"
                            value="{{ old('nim') ?? $sertifikat->nim }}" required>
                        @error('nim')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
