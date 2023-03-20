@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Dosen | Import')
@section('dosen', 'active')
@section('content')

    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Import Dosen</h1>
                <hr>
                <form action="{{ route('import-dosen') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="file" class="form-control @error('dosen') is-invalid @enderror" name="dosen"
                                id="dosen" required autofocus value="{{ old('dosen') }}">
                            @error('dosen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="button mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
