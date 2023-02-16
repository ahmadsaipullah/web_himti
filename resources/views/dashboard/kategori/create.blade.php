@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Kategori | Create')
@section('kategori', 'active')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Create Kategori</h1>
                <hr>
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_kategori">Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori"
                            class="form-control @error('nama_kategori') is invalid @enderror"
                            value="{{ old('nama_kategori') }}" required>
                        @error('nama_kategori')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
