@extends('dashboard.kerangka')
@section('tittle','HIMTI-UMT | Dashboard | Acara | Create')
@section('acara','active')
@section('content')


    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Create Acara</h1>
                <hr>
                <form action="{{ route('acara.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label for="nama">Tittle</label>
                            <input type="text" name="tittle" id="tittle" class="form-control @error('tittle') is invalid @enderror" value=" {{ old('tittle')}}" required>
                            @error('tittle')
                                <div class="alert alert-danger"> {{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control @error('deskripsi') is invalid @enderror" {{ old('deskripsi') }} required></textarea>
                            @error('deskripsi')
                                <div class="alert alert-danger"> {{ $message }} </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Id Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori">
                                <option>---Pilih Kategori---</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
