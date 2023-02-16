@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | Footer')
@section('footer', 'active')
@section('content')

    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Update Footer</h1>
                <hr>
                <form action="{{ route('footer.update', $footer->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email')is invalid @enderror"
                            value="{{ old('email') ?? $footer->email }}" required>
                        @error('email')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="information">Nomor Hp</label>
                        <input type="text" name="nomor_hp" id="nomor_hp"
                            class="form-control @error('nomor_hp')is invalid @enderror"
                            value="{{ old('nomor_hp') ?? $footer->nomor_hp }}" required>
                        @error('nomor_hp')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="information">Nama Information</label>
                        <input type="text" name="information" id="information"
                            class="form-control @error('information')is invalid @enderror"
                            value="{{ old('information') ?? $footer->information }}" required>
                        @error('information')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="copyright">Copyright</label>
                        <input type="text" name="copyright" id="copyright"
                            class="form-control @error('copyright')is invalid @enderror"
                            value="{{ old('copyright') ?? $footer->copyright }}" required>
                        @error('copyright')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
