@extends('dashboard.kerangka')
@section('tittle', 'HIMTI - UMT | Jadwal Sharing | Update')
@section('jadwalSharing', 'active')
@section('content')

    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Edit Jadwal Sharing <br> {{ $jadwal_sharing->tittle }}</h1>
                <hr>
                <form action="{{ route('jadwal-sharing.update', $jadwal_sharing->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="tittle">Tittle</label>
                        <input type="text" name="tittle" id="tittle"
                            class="form-control @error('tittle') is invalid @enderror"
                            value="{{ old('tittle') ?? $jadwal_sharing->tittle }}">
                        @error('tittle')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3"
                            class="form-control summernote @error('deskripsi') is invalid @enderror">{{ old('deskripsi') ?? $jadwal_sharing->deskripsi }} </textarea>
                        @error('deskripsi')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jadwal">Jadwal</label>
                        <input type="text" name="jadwal" id="jadwal"
                            class="form-control @error('jadwal') is invalid @enderror"
                            value="{{ old('jadwal') ?? $jadwal_sharing->jadwal }}">
                        @error('jadwal')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pemateri">Pemateri</label>
                        <input type="text" name="pemateri" id="pemateri"
                            class="form-control @error('pemateri') is invalid @enderror"
                            value="{{ old('pemateri') ?? $jadwal_sharing->pemateri }}">
                        @error('pemateri')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ruangan">Ruangan</label>
                        <input type="text" name="ruangan" id="ruangan"
                            class="form-control @error('ruangan') is invalid @enderror"
                            value="{{ old('ruangan') ?? $jadwal_sharing->ruangan }}">
                        @error('ruangan')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Id Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori">
                            <option value="{{ $jadwal_sharing->id_kategori }}">
                                {{ $jadwal_sharing->kategori->nama_kategori }}</option>
                            <option value disabled>---Pilih Kategori---</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <img src="{{ Storage::url($jadwal_sharing->image) }}" alt="gambar" width="50px"
                            class="tumbnail img-fluid">
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
