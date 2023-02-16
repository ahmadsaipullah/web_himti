@extends('kerangka.master')
@section('tittle','HIMTI-UMT | Klinik')
@section('menuKlinik','active')
@section('content')

  <div class="content-wrapper">
    <div class="container">
{{-- artikel --}}
      <section id="call-to-action">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
              <h3 class="cta-title">Klinik Komputer HIMTI</h3>
              <h6 class="cta-text">Klinik Komputer HIMTI merupakan UMKM yang bergerak dibidang jasa, mulai dari
                service laptop sampai pembuatan website.</h6><br>
              <p class="cta-text"><b>Jika anda membutuhkan jasa kami, silahkan isi form yang sudah disediakan.</b></p>
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
                <img src="{{ asset('assets/images/himti-klinik.png')}}" alt="" width=100%; height=200px;>
              </div>
            </div>
{{-- end service --}}

{{-- foam --}}
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="name">Merek Laptop</label>
                    <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4"
                      data-msg="Please enter at least 4 chars" />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Type Laptop</label>
                    <input type="email" class="form-control" name="email" id="email" data-rule="email"
                      data-msg="Please enter a valid email" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="name">No. HP</label>
                  <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4"
                    data-msg="Please enter at least 8 chars of subject" />
                </div>
                <div class="form-group">
                  <label for="name">Detail Kerusakan</label>
                  <textarea class="form-control" name="message" rows="10" data-rule="required"
                    data-msg="Please write something for us"></textarea>
                </div>
                <div class="form-group">
                  <label for="name" style="color: blue;">Dengan keterbatasan SDM yang kami miliki, mohon tunggu 1x24
                    jam, team kami akan menguhubungi anda kembali!</label>
                </div>
                <div class="text-center"><button type="submit">Kirim</button></div>
              </form>
            </div>
          </div>
        </div>
      </section>
{{-- end foam --}}
      @endsection

