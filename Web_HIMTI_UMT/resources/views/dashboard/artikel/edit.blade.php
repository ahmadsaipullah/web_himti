@extends('dashboard.kerangka')
@section('tittle','HIMTI - UMT | Artikel | Update')
@section('artikel','active')
@section('content')

<div class="container bg-white">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Edit Artikel <br> {{ $artikel->tittle }}</h1>
            <hr>
            <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                        <label for="tittle">Tittle</label>
                        <input type="text" name="tittle" id="tittle" class="form-control @error('tittle') is invalid @enderror" value=" {{ old('tittle') ?? $artikel->tittle }} ">
                        @error('tittle')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group">
                        <label for="deskripsi">deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control @error('deskripsi') is invalid @enderror" >{{ old('deskripsi') ?? $artikel->deskripsi }} </textarea>
                        @error('deskripsi')
                            <div class="alert alert-danger"> {{ $message }} </div>
                        @enderror
                </div>
                <div class="form-group">
                        <label for="image">Image</label>
                        <img src="{{ Storage::url($artikel->image) }}" alt="gambar" width="50px" class="tumbnail img-fluid">
                        <input type="file" name="image" id="image" class="form-control">
                </div>
                     <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection

