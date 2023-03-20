@extends('kerangka.master')
@section('tittle', 'HIMTI-UMT | Tentang')
@section('menuTentang', 'active')
@section('content')

    <div class="content-wrapper">
        <div class="container">
            {{-- artikel --}}
            <section id="about" class="about">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                            <img src="{{ asset('assets/images/HIMTI.png') }}" class="img-fluid" alt=""
                                data-aos="zoom-in">
                        </div>
                        <div class="col-lg-6 pt-5 pt-lg-0">
                            <h3 data-aos="fade-up">HIMTI - UMT</h3>
                            <p data-aos="fade-up" data-aos-delay="100">
                                Himpunan Mahasiswa Teknik Inmormatika Universitas Muhammadiyah Tangerang atau HIMTI - UMT
                                adalah
                                himpunan kampus yang tidak hanya berfokus pada organisasi saja tetapi terhadap akademik
                                juga,
                                bahkan tujuan utama HIMTI yaitu untuk meningkatkan nilai akademik
                                Mahasiswa Teknik Informatika Universitas Muhammadiyah Tangerang.
                            </p>
                            <div class="row">
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                    <i class="bx bx-receipt"></i>
                                    <h4>Tanggal Berdiri HIMTI</h4>
                                    <p></p>
                                </div>
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Pendiri HIMTI</h4>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- end artikel --}}

            {{-- prodi --}}
            <section id="bg" class="team">
                <div class="container" class="faq section-bg">
                    <div class="section-title" data-aos="fade-up">
                        <h2>HIMTI</h2>
                        <p>Struktural Program Studi</p>
                    </div>
                    <div class="row">
                        <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200"></div>
                        <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
                            <div class="member">
                                <img src="{{ asset('assets/images/kaprodi.jpg') }}" class="img-fluid" alt="">
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4>Syepry Maulana Husain, S.Kom, MTI</h4>
                                        <span>Ketua Program Studi</span>
                                    </div>
                                    <div class="social">
                                        <a href=""><i class="icofont-twitter"></i></a>
                                        <a href=""><i class="icofont-facebook"></i></a>
                                        <a href=""><i class="icofont-instagram"></i></a>
                                        <a href=""><i class="icofont-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" data-aos="zoom-in" data-aos-delay="300">
                            <div class="member">
                                <img src="{{ asset('assets/images/sekprodi.jpg') }}" class="img-fluid" alt="">
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4>Mahpud, M.Kom</h4>
                                        <span>Sekretaris Program Studi</span>
                                    </div>
                                    <div class="social">
                                        <a href=""><i class="icofont-twitter"></i></a>
                                        <a href=""><i class="icofont-facebook"></i></a>
                                        <a href=""><i class="icofont-instagram"></i></a>
                                        <a href=""><i class="icofont-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200"></div>
                    </div>
                </div>
            </section>
            {{-- end prodi --}}

            {{-- BPH HIMTI --}}
            <section id="team" class="team">
                <div class="container">
                    <div class="section-title" data-aos="fade-up">
                        <h2>HIMTI</h2>
                        <p>Struktural Periode 2022 - 2023</p>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($about as $index => $about1)
                            @if ($index <= 1)
                                <div class="col-md-1" data-aos="zoom-in" data-aos-delay="200"></div>
                                <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">

                                    <div class="member">
                                        <img src="{{ Storage::url($about1->image) }}" class="img-fluid" alt="gambar">
                                        <div class="member-info">
                                            <div class="member-info-content">
                                                <h4>{{ $about1->nama }}</h4>

                                                <span>{{ $about1->jabatan }}</span>
                                            </div>
                                            <div class="col-md-2" data-aos="zoom-in" data-aos-delay="200"></div>
                                            <div class="social">
                                                <a href="{{ $about1->twitter }}"><i class="icofont-twitter"></i></a>
                                                <a href="{{ $about1->fb }}"><i class="icofont-facebook"></i></a>
                                                <a href="{{ $about1->ig }}"><i class="icofont-instagram"></i></a>
                                                <a href="{{ $about1->linkedin }}"><i class="icofont-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1" data-aos="zoom-in" data-aos-delay="200"></div>
                            @else
                                <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
                                    <div class="member">
                                        <img src="{{ Storage::url($about1->image) }}" class="img-fluid" alt="gambar">
                                        <div class="member-info">
                                            <div class="member-info-content">
                                                <h4>{{ $about1->nama }}</h4>
                                                <span>{{ $about1->jabatan }}</span>
                                            </div>
                                            <div class="social">
                                                <a href="{{ $about1->twitter }}"><i class="icofont-twitter"></i></a>
                                                <a href="{{ $about1->fb }}"><i class="icofont-facebook"></i></a>
                                                <a href="{{ $about1->ig }}"><i class="icofont-instagram"></i></a>
                                                <a href="{{ $about1->linkedin }}"><i class="icofont-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
            </section>
            {{-- end BPH HIMTI --}}

            {{-- visi-misi --}}
            <section id="bg" class="faq section-bg">
                <div class="container">
                    <div class="section-title" data-aos="fade-up">
                        <h2>HIMTI</h2>
                        <p>Visi & Misi</p>
                    </div>
                    <ul class="faq-list">
                        <li data-aos="fade-up" data-aos-delay="100">
                            <a data-toggle="collapse" class="" href="#faq1">Visi<i
                                    class="icofont-simple-up"></i></a>
                            <div id="faq1" class="collapse show">
                                <p>
                                    Menjadikan organisasi yang melahirkan anggota profesional dalam bidang informatika dan
                                    teknologi informasi serta menjunjung tinggi nilai-nilai organisasi.
                                </p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="200">
                            <a data-toggle="collapse" href="#faq2" class="collapsed">Misi<i
                                    class="icofont-simple-up"></i></a>
                            <div id="faq2" class="collapse">
                                <p>1. Menyelenggarakan dan mengembangkan potensi anggota HIMTI dalam bidang teknologi
                                    informasi.
                                </p>
                                <p>2. Membentuk sumber daya manusia yang memiliki integritas, profesional dan kompeten dalam
                                    bidang teknologi informasi.</p>
                                <p>3. Menjalin relasi antara pihak internal dan eksternal kampus.</p>
                                <p>4. Melakukan penelitian dan pengembangan dalam bidang teknologi informasi.</p>
                                <p>5. Menghasilkan karya yang bermanfaat di dalam bidang teknologi informasi dilingkungan
                                    masyarakat.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            {{-- end visi misi --}}
        @endsection
