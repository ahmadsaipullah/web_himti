@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Alumni | Create')
@section('alumni', 'active')
@section('content')

    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Create Alumni</h1>
                <hr>
                <form action="{{ route('alumni.store') }}" method="POST" enctype="multipart/form-data">
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
                            class="form-control @error('perusahaan') is invalid @enderror" value="{{ old('perusahaan') }}"
                            required>
                        @error('perusahaan')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="title" name="title" id="title"
                            class="form-control @error('title') is invalid @enderror" value="{{ old('title') }}" required>
                        @error('title')
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
