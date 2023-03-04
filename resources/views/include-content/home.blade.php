@extends('kerangka.master')
@section('tittle', 'HIMTI-UMT | Home')
@section('menuHome', 'active')
@section('content')

    {{-- banner --}}
    <div class="banner">
        {{-- <div class="container">
            <h1 class="font-weight-semibold">Himpunan Mahasiswa Teknik Informatika<br>Universitas Muhammadiyah Tangerang</h1>
            <img src="{{ asset('assets/images/HIMTI.png') }}" alt="" class="img-fluid" height="500" width="500">
        </div> --}}
        <div class="section-body">
            <div id="carouselExampleIndicators2" class="carousel slide pointer-event" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for ($i = 0; $i < $slider; $i++)
                        <li data-target="#carouselExampleIndicators2" data-slide-to="{{ $i }}"
                            @if ($i == 0) {{ 'active' }} @endif>
                        </li>
                    @endfor
                </ol>
                <div class="carousel-inner">
                    @foreach ($sliderr->take(3) as $slr)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img class="slider d-block w-100" src="{{ asset('assets/img/slider/' . $slr->image) }}">
                            <div class="carousel-caption d-none d-md-block">
                                {{-- <!--<h5>{{$slr->title}}</h5>-->
                            <!--<p>L{{$slr->deskripsi}}</p>--> --}}
                            </div>
                        </div>
                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
    {{-- end banner --}}

    {{-- prestasi --}}
    <div class="content-wrapper">
        <div class="container">
            <section class="features-overview" id="features-section">
                <div class="section-title" data-aos="fade-up">
                    <h2>HIMTI</h2>
                    <p>Prestasi Kami</p>
                </div>
                <div class="d-md-flex justify-content-between">
                    <div class="grid-margin d-flex justify-content-start">
                        <div class="features-width">
                            <img src="{{ asset('assets/images/Group12.svg') }}" alt="" class="img-icons">
                            <h5 class="py-3">Juara II<br>Lomba Startup Inovation</h5>
                            <p class="text-muted">Lomba Startup Inovation ini diadakan oleh PERMIKOMNAS Wilayah IV Banten
                                yang
                                diadakan secara online pada Tanggal 10-11 April 2021.</p>
                            <a href="#">
                                <p class="readmore-link">Readmore</p>
                            </a>
                        </div>
                    </div>
                    <div class="grid-margin d-flex justify-content-center">
                        <div class="features-width">
                            <img src="{{ asset('assets/images/clapperboard.png') }}" height="65" width="65"
                                alt="" class="img-icons">
                            <h5 class="py-3">Juara II<br>Lomba Short Movie</h5>
                            <p class="text-muted">Lomba Short Movie ini diadakan oleh Badan Eksekutif Mahasiswa Global
                                Institute untuk
                                memperingati hari Kartini pada Tanggal 21 April 2021.</p>
                            <a href="#">
                                <p class="readmore-link">Readmore</p>
                            </a>
                        </div>
                    </div>
                    <div class="grid-margin d-flex justify-content-end">
                        <div class="features-width">
                            <img src="{{ asset('assets/images/computer.png') }}" height="65" width="65"
                                alt="" class="img-icons">
                            <h5 class="py-3">Juara II<br>Lomba Design Grafis</h5>
                            <p class="text-muted">Lomba Design Grafis ini diadakan oleh Universitas Darma Persada, Jakarta
                                Timur.</p>
                            <a href="#">
                                <p class="readmore-link">Readmore</p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            {{-- end prestasi --}}

            {{-- content sharing --}}
            @foreach ($sharing as $item)
                <section class="digital-marketing-service" id="digital-marketing-section">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
                            <h3 class="m-0">SHARING<br>{{ $item->tittle }}</h3>
                            <div class="col-lg-7 col-xl-6 p-0">
                                <p class="py-4 m-0 text-muted">
                                    <b>[{{ $item->tittle }}]</b>


                                </p>
                                <p class="pb-2 font-weight-medium text-muted">
                                    <b>Hari/Tanggal : {{ $item->jadwal }}
                                        <br> Jam : 13.00 s/d Selesai
                                        <br> Materi : {{ $item->tittle }}
                                </p></b>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                            <img src="{{ Storage::url($item->image) }}" alt="" height="336" width="306"
                                class="img-fluid">
                        </div>
                    </div>
                    <br><br>
            @endforeach
            {{-- end content sharing --}}

            {{-- content acara --}}
            @foreach ($acara as $item)
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
                        <img src="{{ Storage::url($item->image) }}" alt="" height="336" width="306"
                            class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
                        <h3 class="m-0">HIFEST<br>{{ $item->tittle }}</h3>
                        <div class="col-lg-9 col-xl-8 p-0">
                            <p class="py-4 m-0 text-muted">Workshop ini mengambil Tema.</p>
                            <p class="pb-2 font-weight-medium text-muted">{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                </div>
                <div class="banner-clinic">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="col-md-12 text-center pb-5">
                                <img src="{{ asset('assets/images/himti-klinik.png') }}" width="1100" alt=""
                                    class="img-fluid">
                                <div class="card-desc-box d-flex align-items-center justify-content-around">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            @endforeach
            {{-- end content acara --}}

            {{-- alumni --}}
            <section class="case-studies" id="case-studies-section">
                <div class="section-title" data-aos="fade-up">
                    <h2>HIMTI</h2>
                    <p>Pembelajaran</p>
                </div>
                <div class="row grid-margin">
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-primary text-center card-contents">
                                    <div class="card-image">
                                        <img src="assets/images/java.png" class="case-studies-card-img" alt="">
                                    </div>
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Java Programming</h6>
                                            <a href="{{ route('sharing') }}"><button class="btn btn-white">Read
                                                    More</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Java Programming</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-warning text-center card-contents">
                                    <div class="card-image">
                                        <img src="assets/images/html-coding.png" class="case-studies-card-img"
                                            alt="">
                                    </div>
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Web Development</h6>
                                            <a href="{{ route('sharing') }}"><button class="btn btn-white">Read
                                                    More</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Web Development</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-violet text-center card-contents">
                                    <div class="card-image">
                                        <img src="assets/images/computer.png" class="case-studies-card-img"
                                            alt="">
                                    </div>
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Desain Grafis</h6>
                                            <a href="{{ route('sharing') }}"><button class="btn btn-white">Read
                                                    More</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Desain Grafis</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card" data-aos="zoom-in" data-aos-delay="600">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-success text-center card-contents">
                                    <div class="card-image">
                                        <img src="assets/images/android-logo.png" class="case-studies-card-img"
                                            alt="">
                                    </div>
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Android Development</h6>
                                            <a href="{{ route('sharing') }}"><button class="btn btn-white">Read
                                                    More</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Android Development</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="customer-feedback" id="feedback-section">
                <div class="section-title" data-aos="fade-up">
                    <h2>HIMTI</h2>
                    <p>Alumni</p>
                </div>
                <div class="row">
                    <div class="owl-carousel owl-theme grid-margin">
                        @forelse ($alumni as $item)
                            <div class="card customer-cards">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ Storage::url($item->image) }}" width="89" height="89"
                                            alt="gambar" class="img-customer">
                                        <p class="m-0 py-3 text-muted">{{ $item->perusahaan }}</p>
                                        <div class="content-divider m-auto"></div>
                                        <h6 class="card-title pt-3">{{ $item->name }}</h6>
                                        <h6 class="customer-designation text-muted m-0">{{ $item->title }}</h6>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="text-center">Cooming Soon</h4>
                        @endforelse

                    </div>
                </div>
            </section>
            {{-- end alumni --}}

            {{-- partnership --}}
            <section class="customer-feedback" id="feedback-section">
                <div class="section-title" data-aos="fade-up">
                    <h2>HIMTI</h2>
                    <p>Partnership</p>
                </div>
                <div class="row">
                    <div class="owl-carousel owl-theme grid-margin">
                        @forelse ($partnership as $item)
                            <div class="card customer-cards">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ Storage::url($item->image) }}" width="89" height="89"
                                            alt="" class="img-customer">
                                        <p class="m-0 py-3 text-muted">{{ $item->perusahaan }}
                                        </p>
                                        <div class="content-divider m-auto"></div>
                                        <h6 class="card-title pt-3">{{ $item->nama }}</h6>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="text-center">Cooming Soon</h4>
                        @endforelse
                    </div>
                </div>
            </section>
            {{-- end partnership --}}
        @endsection
