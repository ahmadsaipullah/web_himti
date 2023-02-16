@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Struktural | Create')
@section('struktural', 'active')
@section('content')


    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Create Struktural</h1>
                <hr>
                <form action="{{ route('struktural.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="number" name="nim" id="nim"
                            class="form-control @error('nim') is invalid @enderror" value="{{ old('nim') }}" required
                            minlength="10" maxlength="10">
                        @error('nim')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="jabatan" name="jabatan" id="jabatan"
                            class="form-control @error('jabatan') is invalid @enderror" value="{{ old('jabatan') }}"
                            required>
                        @error('jabatan')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_angkatan">Angkatan</label>
                        <select class="form-control" name="id_angkatan" id="id_angkatan" required>
                            <option>---Pilih Kategori---</option>
                            @foreach ($angkatans as $angkatan)
                                <option value="{{ $angkatan->id }}">{{ $angkatan->angkatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="status" name="status" id="status"
                            class="form-control @error('status') is invalid @enderror" value="{{ old('status') }}" required>
                        @error('status')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image"
                            class="form-control @error('status') is invalid @enderror" required>
                        @error('image')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
