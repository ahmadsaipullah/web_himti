@extends('kerangka.master')
@section('tittle', 'HIMTI-UMT | Detail Agenda')
@section('menuAgenda', 'active')
@section('content')

    <section id="speakers-details">
        <div class="container">
            <div class="section-header text-center pb-5">
                <h2>Detail Agenda</h2>
                <hr width="30%">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ Storage::url($agenda->image) }}" alt="Speaker 1" class="img-fluid">
                </div>
                <div class="col-md-6 justify-content-center">
                    <div class="align-items-lg-center"><br><br><br>
                        <h2>{{ $agenda->tittle }}</h2>
                        <h5>Himpunan Mahasiswa Teknik Informatika Universitas Muhammadiyah Tangerang akan mengadakan
                            kegiatan {{ $agenda->tittle }}
                        </h5>

                        <h6><b>Hari : {{ $agenda->jadwal }}</b></h6>
                        <h6><b>Lokasi : {{ $agenda->lokasi }}</b></h6>
                        <h6><b>Pengisi Acara : {{ $agenda->pengisi_acra }}</b></h6>

                    </div>
                    {{-- <button class="btn btn-info" data-target="#exampleModal" data-toggle="modal">Daftar Sekarang</button> --}}
                </div>
            </div>
        </div>
    </section>
    <section id="speakers-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12 justify-content-center">
                    <div class="align-items-lg-center"><br><br><br>
                        <h2>Ini isi Deskripsi detail </h2>
                        <h5>[{{ $agenda->tittle }}] Himpunan Mahasiswa Teknik Informatika Universitas Muhammadiyah
                            Tangerang, {{ $agenda->deskripsi }}
                        </h5>

                        {{-- <h5>Dengan mengambl Tema, <b> "HOW TO BUILD WEBSITE COMPANY PROFILE WITH LARAVEL FRAMEWORK?"</b></h5> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>


    <br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br>
