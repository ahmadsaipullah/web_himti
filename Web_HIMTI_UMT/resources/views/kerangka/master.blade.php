<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('tittle')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('kerangka.style')
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
      <div class="container">
        <div class="navbar-brand-wrapper d-flex w-100">
          <img src="{{ asset('assets/images/HIMTI.png')}}" alt="" eight="h75" width="75">
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="mdi mdi-menu navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
            <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
              <div class="navbar-collapse-logo">
                <img src="{{ asset('images/Group2.svg')}}" alt="">
              </div>
              <button class="navbar-toggler close-button" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
              </button>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('menuHome')"  href="{{ route('home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('menuTentang')"  href="{{ route('tentang')}}">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('menuSharing')"  href="{{ route('sharing')}}">Sharing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('menuTutorial')"  href="{{route('tutorial')}}">Tutorial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('menuAgenda')"  href="{{ route('agenda')}}">Agenda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('menuArtikel')"  href="{{ route('artikel')}}">Artikel</a>
              </li>
            <li class="nav-item">
              <a class="nav-link @yield('menuKlinik')"  href="{{ route('klinik')}}">Klinik</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
        @yield('content')
  <section class="contact-details" id="contact-details-section">
    <div class="col-12 col-md-12 col-lg-12 grid-margin text-center">
      <img src="{{ asset('assets/images/HIMTI.png')}}" height="75" width="75" alt="" class="pb-2">
      <p class="text-muted">himti.umt11@gmail.com</p>
      <p class="text-muted">Kahmidin Latupono +62888-1488-721</p>
      <a href="#"><span class="mdi mdi-facebook"></span></a>
      <a href="#"><span class="mdi mdi-twitter"></span></a>
      <a href="https://www.instagram.com/himti.umt/"><span class="mdi mdi-instagram"></span></a>
      <a href="#"><span class="mdi mdi-linkedin"></span></a>
    </div>
  </section>
  <footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2022<a href="#" class="px-1">Kelompok Belajar</a>.</p>
  </footer>
</div>
</div>
     @include('kerangka.script')
</body>
</html>
