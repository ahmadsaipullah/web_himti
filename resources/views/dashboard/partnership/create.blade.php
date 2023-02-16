@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Partnership | Create')
@section('partnership', 'active')
@section('content')


    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Create Partnership</h1>
                <hr>
                <form action="{{ route('partnership.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="perusahaan">Perusahaan</label>
                        <input type="perusahaan" name="perusahaan" id="perusahaan"
                            class="form-control summernote @error('perusahaan') is invalid @enderror"
                            value="{{ old('perusahaan') }}" required>
                        @error('perusahaan')
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
