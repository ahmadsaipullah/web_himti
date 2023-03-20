@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Danus Merchandise | Create')
@section('merchandise', 'active')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Create Merchandise</h1>
                <hr>
                <form action="{{ route('danus-merchandise.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is invalid @enderror" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga"
                            class="form-control @error('harga') is invalid @enderror" value="{{ old('harga') }}" required>
                        @error('harga')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
