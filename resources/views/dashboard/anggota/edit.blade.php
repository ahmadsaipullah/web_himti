@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Anggota | Update')
@section('anggota', 'active')
@section('content')


    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Update Anggota</h1>
                <hr>
                <form action="{{ route('anggota.update', $anggotum->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is invalid @enderror"
                            value="{{ old('nama') ?? $anggotum->nama }}">
                        @error('nama')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is invalid @enderror"
                            value="{{ old('email') ?? $anggotum->email }}">
                        @error('email')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="number" name="nim" id="nim"
                            class="form-control @error('nim') is invalid @enderror"
                            value="{{ old('nim') ?? $anggotum->nim }}">
                        @error('nim')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No_hp</label>
                        <input type="number" name="no_hp" id="no_hp"
                            class="form-control @error('no_hp') is invalid @enderror"
                            value="{{ old('no_hp') ?? $anggotum->no_hp }}">
                        @error('no_hp')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_darurat">No_darurat</label>
                        <input type="number" name="no_darurat" id="no_darurat"
                            class="form-control @error('no_darurat') is invalid @enderror"
                            value="{{ old('no_darurat') ?? $anggotum->no_darurat }}" minlength="11" maxlength="13">
                        @error('no_darurat')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat"
                            class="form-control @error('alamat') is invalid @enderror"
                            value="{{ old('alamat') ?? $anggotum->alamat }}">
                        @error('alamat')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_angkatan">Id Kategori</label>
                        <select class="form-control" name="id_angkatan" id="id_angkatan">
                            <option value="{{ $anggotum->id_angkatan }}">{{ $anggotum->angkatan->angkatan }}</option>
                            <option value disabled>---Pilih Kategori---</option>
                            @foreach ($angkatans as $angkatan)
                                <option value="{{ $angkatan->id }}">{{ $angkatan->angkatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
