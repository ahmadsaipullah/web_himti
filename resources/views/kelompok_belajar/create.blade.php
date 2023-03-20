@extends('kerangka.master')
@section('tittle', 'HIMTI-UMT | Pendaftaran')
@section('pendaftaran', 'active')
@section('kelompokbelajar', 'active')
@section('content')
    @include('sweetalert::alert')
    <div class="container mt-5 section-body">
        <h1 class="text-center text-bold text-dark col-md-12">Pendaftaran Kelompok Belajar</h1>
        <div class="row border card-body py-4">
            <div class="col-md-12">
                <form action="{{ route('kelompok_belajar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is invalid @enderror" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="number" name="nim" id="nama"
                            class="form-control @error('nim') is invalid @enderror" value="{{ old('nim') }}" required>
                        @error('nim')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" id="kelas"
                            class="form-control @error('kelas') is invalid @enderror" value="{{ old('kelas') }}">
                        @error('kelas')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="number" name="angkatan" id="angkatan"
                            class="form-control @error('angkatan') is invalid @enderror" value="{{ old('angkatan') }}">
                        @error('angkatan')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bidang">Bidang</label>
                        <select class="form-select form-control" name="bidang" id="bidang">
                            <option selected disabled>--- Pilih Bidang ---</option>
                            <option name="bidang" id="bidang" value="Web Developer">Web Developer</option>
                            <option name="bidang" id="bidang" value="Android Develope">Android Developer</option>
                            <option name="bidang" id="bidang" value="Cyber Security">Cyber Security</option>
                            <option name="bidang" id="bidang" value="UI/UX Desainer">UI/UX Desainer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Pas Foto Formal</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary my-4" disabled>Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
