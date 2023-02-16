@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Jadwal Sharing | Create')
@section('jadwalSharing', 'active')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Create Jadwal Sharing</h1>
                <hr>
                <form action="{{ route('jadwal-sharing.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Tittle</label>
                        <input type="text" name="tittle" id="tittle"
                            class="form-control @error('tittle') is invalid @enderror" value="{{ old('tittle') }}" required>
                        @error('tittle')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="8"
                            class="form-control summernote @error('deskripsi') is invalid @enderror" {{ old('deskripsi') }} required></textarea>
                        @error('deskripsi')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jadwal">Jadwal</label>
                        <input type="text" name="jadwal" id="jadwal"
                            class="form-control @error('jadwal') is invalid @enderror" value="{{ old('jadwal') }}">
                        @error('jadwal')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pemateri">Pemateri</label>
                        <input type="text" name="pemateri" id="pemateri"
                            class="form-control @error('pemateri') is invalid @enderror" value="{{ old('pemateri') }}">
                        @error('pemateri')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ruangan">Ruangan</label>
                        <input type="text" name="ruangan" id="ruangan"
                            class="form-control @error('ruangan') is invalid @enderror" value="{{ old('ruangan') }}">
                        @error('ruangan')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Id Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori">
                            <option>---Pilih Kategori---</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
