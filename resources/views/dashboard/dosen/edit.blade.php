@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Dosen | Create')
@section('dosen', 'active')
@section('content')

    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Update Dosen</h1>
                <hr>
                <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="nidn">Nidn</label>
                        <input type="number" name="nidn" id="nidn"
                            class="form-control @error('nidn') is invalid @enderror"
                            value="{{ old('nidn') ?? $dosen->nidn }}" required minlength="9" maxlength="11">
                        @error('nidn')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is invalid @enderror"
                            value="{{ old('nama') ?? $dosen->nama }}" required>
                        @error('nama')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email"
                            class="form-control @error('email') is invalid @enderror"
                            value="{{ old('email') ?? $dosen->email }}" required>
                        @error('email')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No_hp</label>
                        <input type="number" name="no_hp" id="no_hp"
                            class="form-control @error('no_hp') is invalid @enderror"
                            value="{{ old('no_hp') ?? $dosen->no_hp }}" minlength="11" maxlength="13" required>
                        @error('no_hp')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="matakuliah">Mata Kuliah</label>
                        <input type="matakuliah" name="matakuliah" id="matakuliah"
                            class="form-control @error('matakuliah') is invalid @enderror"
                            value="{{ old('matakuliah') ?? $dosen->matakuliah }}" required>
                        @error('matakuliah')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
