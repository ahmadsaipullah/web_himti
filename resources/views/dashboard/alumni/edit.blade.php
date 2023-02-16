@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Alumni | Update')
@section('alumni', 'active')
@section('content')


    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Update Alumni</h1>
                <hr>
                <form action="{{ route('alumni.update', $alumnus->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is invalid @enderror"
                            value="{{ old('nama') ?? $alumnus->nama }}" required>
                        @error('nama')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="perusahaan">Perusahaan</label>
                        <input type="perusahaan" name="perusahaan" id="perusahaan"
                            class="form-control summernote @error('perusahaan') is invalid @enderror"
                            value="{{ old('perusahaan') ?? $alumnus->perusahaan }}" required>
                        @error('perusahaan')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="title" name="title" id="title"
                            class="form-control @error('title') is invalid @enderror"
                            value="{{ old('title') ?? $alumnus->title }}" required>
                        @error('title')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <img src="{{ Storage::url($alumnus->image) }}" alt="gambar" width="50px"
                            class="tumbnail img-fluid">
                        <input type="file" name="image" id="image"
                            class="form-control @error('image') is invalid @enderror">
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
