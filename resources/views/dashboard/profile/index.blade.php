@extends('dashboard.kerangka')
@section('tittle', 'HIMTI-UMT | Profile')
@section('profile', 'active')
@section('content')
    @include('sweetalert::alert')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile {{ Auth()->user()->name }}</h1>

    </div>

    <div class="section-body row">
        <div class="col-lg-7">
            <!-- Alert -->
            <div class="form-group mb-4">
                @if (session('message-success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session('message-success') }}
                        </div>
                    </div>
                @endif
            </div>

            <div class="card author-box card-dark">
                <div class="card-body row">
                    <div class="author-box-left col-md-5">
                        @if (Auth()->user()->image)
                            <img alt="image" class="img-fluid img-profile"
                                src="{{ Storage::url(Auth()->user()->image) }}" style="width: 250px; height: 250px;">
                        @else
                            <img alt="image" class="img-fluid img-profile"
                                src="{{ asset('assets/images/user_default.png') }}" style="width: 250px; height: 250px;">
                        @endif

                        <div class="clearfix"></div>
                    </div>
                    <div class="author-box-details col-md-7">
                        <div class="author-box-name">
                            <p>Nama : <b>{{ Auth()->user()->name }}</p></b>
                        </div>
                        <div class="author-box-job">
                            <p>No Hp : <b>{{ Auth()->user()->no_hp }}</b></p>
                        </div>
                        <div class="author-box-description">
                            <p>Email : <b>{{ Auth()->user()->email }}</b></p>
                        </div>

                    </div>

                </div>
                <div class="row justify-content-end">
                    <div class="col-md-3">
                        {{ Auth()->user()->created_at->isoformat('DD MMMM Y') }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="float-left ml-4">
                            <a href="{{ route('profile.edit', Auth()->user()->id) }}" class="btn btn-sm btn-primary">Edit
                                Profile</a>
                        </div>
                        <div class="float-right ml-auto mr-4">
                            <a href="{{ route('password.edit', Auth()->user()->id) }}" class="btn btn-sm btn-dark">Ubah
                                Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>



@endsection
