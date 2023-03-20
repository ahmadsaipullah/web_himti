@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Danus Merchandise | Update')
@section('merchandise', 'active')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Update Merchandise</h1>
                <hr>
                <form action="{{ route('danus-merchandise.update', $danus_merchandise->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is invalid @enderror"
                            value="{{ old('title') ?? $danus_merchandise->title }}" required>
                        @error('title')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga"
                            class="form-control @error('title') is invalid @enderror"
                            value="{{ old('harga') ?? $danus_merchandise->harga }}" required>
                        @error('harga')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <img src="{{ Storage::url($danus_merchandise->image) }}" alt="gambar" width="50px"
                            class="tumbnail img-fluid">
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
