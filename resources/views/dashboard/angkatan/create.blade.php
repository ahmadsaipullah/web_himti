@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Angkatan | Create')
@section('angkatan', 'active')
@section('content')


    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Create Angkatan</h1>
                <hr>
                <form action="{{ route('angkatan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="number" name="angkatan" id="angkatan"
                            class="form-control @error('angkatan')is invalid @enderror" value="{{ old('angkatan') }}"
                            required>
                        @error('angkatan')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
