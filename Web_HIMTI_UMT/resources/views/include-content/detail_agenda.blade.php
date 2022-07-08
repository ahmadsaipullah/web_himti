@extends('kerangka.master')
@section('tittle','HIMTI-UMT | Detail Agenda')
@section('menuAgenda','active')
@section('content')

    <section id="speakers-details">
        <div class="container">
            <div class="section-header text-center pb-5">
                <h2>Detail Agenda</h2>
                <hr width="30%">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ Storage::url($agenda->image)}}" alt="Speaker 1" class="img-fluid">
                </div>
                <div class="col-md-6 justify-content-center">
                    <div class="align-items-lg-center"><br><br><br>
                        <h2>{{ $agenda->tittle }}</h2>
                        <h5>Himpunan Mahasiswa Teknik Informatika Universitas Muhammadiyah Tangerang akan mengadakan kegiatan {{ $agenda->tittle }}
                        </h5>

                        <h5>{{ $agenda->deskripsi }}</h5>

                        {{-- <h5>
                            <b>Hari/Tanggal : Minggu, 31 Januari 2021.
                                <br> Jam : 13.00 s/d Selesai.
                                <br> Tempat : Aula Jendral Soedirman, Universitas Muhammadiyah Tangerang.</b>
                            </p> --}}
                    </div>
                    <button class="btn btn-info" data-target="#exampleModal" data-toggle="modal">Daftar Sekarang</button>
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
                        <h5>[{{ $agenda->tittle }}] Himpunan Mahasiswa Teknik Informatika Universitas Muhammadiyah Tangerang akan mengadakan kegiatan WORKSHOP
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



