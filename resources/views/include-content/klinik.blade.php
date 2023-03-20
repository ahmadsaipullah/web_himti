@extends('kerangka.master')
@section('tittle', 'HIMTI-UMT | Klinik')
@section('menuKlinik', 'active')
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
                            {{-- ukuran slider L=182,88 T=86,36 --}}
                            <img src="{{ Storage::url($slr->image) }}" alt="gambar" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                {{-- <h5>{{ $slr->title }}</h5>
                                <p>{{ $slr->deskripsi }}</p> --}}
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
    <div class="content-wrapper">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>HIMTI</h2>
                <p>Merchandise</p>
            </div>
            <div class="owl-carousel owl-theme grid-margin">
                @forelse ($merchandise as $merch)
                    <div class="card customer-cards">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ Storage::url($merch->image) }}" width="250" height="250" alt="gambar"
                                    class="img-customer img-fluid"
                                    style="cursor: pointer; border-radius:5px; box-shadow: 0px 2px 2px 1px rgba(0, 0, 0, 0.3);">
                                <h4 class="m-0 py-3 text-dark">{{ $merch->title }}
                                </h4>
                                <h6 class="card-title pt-3">Rp. {{ $merch->harga }} </h6>
                                <div class="mt-4">
                                    <a href="http://shopee.co.id/lapak_informatika22" class="btn btn-primary">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="text-center">Cooming Soon</h4>
                @endforelse
            </div>

        </div>
    </div>
    {{-- end banner --}}
    <div class="content-wrapper">

        <div class="container">
            {{-- artikel --}}
            <section id="call-to-action">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 text-center text-lg-left">
                            <h3 class="cta-title">Klinik Komputer HIMTI</h3>
                            <h6 class="cta-text">Klinik Komputer HIMTI merupakan UMKM yang bergerak dibidang jasa, mulai
                                dari
                                service laptop sampai pembuatan website.</h6><br>
                            <p class="cta-text"><b>Jika anda membutuhkan jasa kami, silahkan isi form yang sudah
                                    disediakan.</b></p>
                        </div>
                        <div class="col-lg-3 cta-btn-container text-center">
                            <a class="cta-btn align-middle" href="#contact">Jelaskan yang Anda Butuhkan</a>
                        </div>
                    </div>
                </div>
            </section>
            {{-- end artikel --}}

            {{-- service --}}
            <section id="contact" class="contact">
                <div class="container">
                    <div class="section-title" data-aos="fade-up">
                        <h2>HIMTI</h2>
                        <p>Klinik Komputer</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="info">
                                <div class="">
                                    <i class=""></i>
                                    <h4>Service</h4>
                                    <p>Laptop</p>
                                </div>
                                <div class="">
                                    <i class=""></i>
                                    <h4>Upgrade</h4>
                                    <p>Software dan Hardware</p>
                                </div>
                                <div class="">
                                    <i class=""></i>
                                    <h4>Pembuatan</h4>
                                    <p>Website, Mobile App dan CV</p>
                                </div>
                                <div class="d-flex justify-content-center pt-3">
                                    <img src="{{ asset('assets/images/himti.png') }}" alt="gambar" width="300px"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        {{-- end service --}}

                        {{-- foam --}}
                        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="php-email-form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Merek Laptop</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            data-rule="minlen:4" data-msg="Please enter at least 4 chars" disabled />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Type Laptop</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            data-rule="email" data-msg="Please enter a valid email" disabled />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">No. HP</label>
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"
                                        disabled />
                                </div>
                                <div class="form-group">
                                    <label for="name">Detail Kerusakan</label>
                                    <textarea class="form-control" name="message" rows="10" data-rule="required"
                                        data-msg="Please write something for us" disabled></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name" style="color: blue;">Untuk dapat berkomunikasi langsung dengan
                                        admin
                                        klinik
                                        bisa langsung klik hubungi dibawah ini Terimakasih!</label>
                                </div>
                                <div class="text-center">
                                    <a
                                        href="whatsapp://send?text=Halo%20Admin,%20Saya%20mau%20Order%20dan%20Service!!&phone=+6281398162287"><button
                                            type="submit">Hubungi
                                            <span class="mdi mdi-whatsapp"></span></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- end foam --}}
        @endsection
