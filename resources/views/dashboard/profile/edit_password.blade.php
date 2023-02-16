@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Dashboard | User | Edit Password')
@section('user', 'active')
@section('content')
    @include('sweetalert::alert')

    <div class="row ">
        <div class="col-md-8 card author-box">
            <h1 class="text-center">Edit Password</h1>
            <hr>
            <div class="container bg-white">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('password.update', auth()->user()->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="password">Password old</label>
                        <input type="password" name="old_password" id="old_password"
                            class="form-control
                    @error('old_password') is invalid @enderror" required>
                        @error('old_password')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control
                    @error('password') is invalid @enderror" required>
                        @error('password')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control @error('password_confirmation') is invalid @enderror" required>
                        @error('password_confirmation')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
