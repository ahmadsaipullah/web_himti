@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | User | Update')
@section('user', 'active')
@section('content')
    <div class="container bg-white">
        <div class="row ">
            <div class="col-md-8 card author-box">
                <h1 class="text-center">Edit Profile</h1>
                <hr>
                <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is invalid @enderror"
                            value="{{ old('name') ?? $profile->name }}" required>
                        @error('name')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is invalid @enderror"
                            value="{{ old('email') ?? $profile->email }}" readonly>
                        @error('email')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="number" name="no_hp" id="no_hp"
                            class="form-control
                    @error('no_hp') is invalid @enderror" required
                            value="{{ old('no_hp') ?? $profile->no_hp }}">
                        @error('no_hp')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control
                    @error('password') is invalid @enderror" required>
                        @error('password')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="verifikasi_password">Verifikasi Password</label>
                        <input type="password" name="verifikasi_password" id="verifikasi_password"
                            class="form-control @error('verifikasi_password') is invalid @enderror" required>
                        @error('verifikasi_password')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="id_level">Level</label>
                        <select class="form-control" name="id_level" id="id_level" required>
                            <option value="{{ $admin->id_level }}">{{ $admin->level->level }}</option>
                            <option>---Pilih Level---</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->level }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="image">Image</label>
                        <img src="{{ Storage::url($profile->image) }}" alt="gambar" width="50px"
                            class="tumbnail img-fluid">
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
