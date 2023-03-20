@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Admin | Update')
@section('admin', 'active')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Update Admin</h1>
                <hr>
                <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is invalid @enderror"
                            value="{{ old('name') ?? $admin->name }}" required>
                        @error('name')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is invalid @enderror"
                            value="{{ old('email') ?? $admin->email }}" required>
                        @error('email')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="number" name="no_hp" id="no_hp"
                            class="form-control
                    @error('no_hp') is invalid @enderror" required
                            value="{{ old('no_hp') ?? $admin->no_hp }}">
                        @error('no_hp')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_level">Level</label>
                        <select class="form-control" name="id_level" id="id_level" required>
                            <option value="{{ $admin->id_level }}">{{ $admin->level->level }}</option>
                            <option>---Pilih Level---</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->level }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        @if (Auth()->user()->image)
                            <img src="{{ Storage::url($admin->image) }}" alt="gambar" width="50px"
                                class="tumbnail img-fluid">
                        @else
                            <img alt="image" class="img-fluid tumbnail"
                                src="{{ asset('assets/images/user_default.png') }}" width="150px"
                                class="tumbnail img-fluid">
                        @endif

                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
