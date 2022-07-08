
@extends('dashboard.kerangka')
@section('tittle','HIMTI-UMT | Dashboard')
@section('dashboard','active')
@section('content')
@include('sweetalert::alert')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn bg-gradient-primary shadow-sm text-white"><i
                class="fas fa-download fa-sm text-white"></i> Generate Report</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Anggota (HIMTI UMT)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$anggota}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-address-card fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Acara (HIMTI UMT)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$acara}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jadwal Sharing (HIMTI UMT)
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$sharing}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Artikel (HIMTI UMT)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$artikel}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pen fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- banner --}}
    <div class="text-center">
        <img src="{{ asset('assets/images/HIMTI.png')}}" rel="icon" alt="gambar" width="450px" class="thumbnail img-fluid">
    </div>
{{-- end banner --}}

        @endsection
