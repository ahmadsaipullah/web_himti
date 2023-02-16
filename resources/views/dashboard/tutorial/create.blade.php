@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Tutorial | Create')
@section('tutorial', 'active')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Create Tutorial</h1>
                <hr>
                <form action="{{ route('tutorial.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul"
                            class="form-control @error('judul') is invalid @enderror" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" id="link"
                            class="form-control @error('link') is invalid @enderror" value="{{ old('link') }}" required>
                        @error('link')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
