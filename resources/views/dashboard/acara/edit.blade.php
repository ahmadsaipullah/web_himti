@extends('dashboard.kerangka')
@section('tittle', 'HIMTI - UMT | Artikel | Update')
@section('acara', 'active')
@section('content')

    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Edit Acara <br> {{ $acara->tittle }}</h1>
                <hr>
                <form action="{{ route('acara.update', $acara->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="tittle">Tittle</label>
                        <input type="text" name="tittle" id="tittle"
                            class="form-control @error('tittle') is invalid @enderror"
                            value="{{ old('tittle') ?? $acara->tittle }}">
                        @error('tittle')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3"
                            class="form-control summernote @error('deskripsi') is invalid @enderror">{{ old('deskripsi') ?? $acara->deskripsi }} </textarea>
                        @error('deskripsi')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jadwal">jadwal</label>
                        <input type="text" name="jadwal" id="jadwal"
                            class="form-control @error('jadwal') is invalid @enderror"
                            value="{{ old('jadwal') ?? $acara->jadwal }}" required>
                        @error('jadwal')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pengisi_acra">Pengisi Acara</label>
                        <input type="text" name="pengisi_acra" id="pengisi_acra"
                            class="form-control @error('pengisi_acra') is invalid @enderror"
                            value="{{ old('pengisi_acra') ?? $acara->pengisi_acra }}" required>
                        @error('pengisi_acra')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" name="lokasi" id="lokasi"
                            class="form-control @error('lokasi') is invalid @enderror"
                            value="{{ old('lokasi') ?? $acara->lokasi }}" required>
                        @error('lokasi')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Id Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori">
                            <option value="{{ $acara->id_kategori }}">{{ $acara->kategori->nama_kategori }}</option>
                            <option value disabled>---Pilih Kategori---</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <img src="{{ Storage::url($acara->image) }}" alt="gambar" width="50px"
                            class="tumbnail img-fluid">
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
