@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Tutorial | Update')
@section('tutorial', 'active')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Update Tutorial</h1>
                <hr>
                <form action="{{ route('tutorial.update', $tutorial->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul"
                            class="form-control @error('judul') is invalid @enderror"
                            value="{{ old('judul') ?? $tutorial->judul }}" required>
                        @error('judul')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" id="link"
                            class="form-control @error('link') is invalid @enderror"
                            value="{{ old('link') ?? $tutorial->link }}" required>
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
