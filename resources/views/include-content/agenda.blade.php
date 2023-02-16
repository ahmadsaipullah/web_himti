@extends('kerangka.master')
@section('tittle', 'HIMTI-UMT | Agenda')
@section('menuAgenda', 'active')
@section('content')

    {{-- agenda --}}
    <div class="container">
        <section id="speakers">
            <div class="section-title" data-aos="fade-up">
                <h2>HIMTI</h2>
                <p>Agenda</p>
            </div>
            <div class="col-12 text-center pb-2">
                <p>Beberapa Agenda kami dalam acara HIMTI FESTIVAL</p>
            </div>
            <div class="row">
                @foreach ($agendas as $agenda)
                    <div class="col-lg-4 col-md-4">
                        <div class="speaker" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ Storage::url($agenda->image) }}" alt="gambar" class="img-fluid">
                            <div class="details">
                                <h3><a href="{{ route('detailAgenda', $agenda->id) }} ">{{ $agenda->tittle }}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        {{-- end agenda --}}
        <br>
        {{-- <section id="speakers">
            <div class="container" data-aos="fade-up">
                <div class="section-title" data-aos="fade-up">
                    <h2>HIMTI</h2>
                    <p>Pembicara</p>
                </div>
                <div class="col-12 text-center pb-2">
                    <p>Beberapa Pembicara kami dalam acara HIMTI FESTIVAL</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="speaker" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ asset('assets/images/pakono.jpg') }}" alt="Speaker 1" class="img-fluid">
                            <div class="details">
                                <h3><a href="#">Onno Widodo Purbo</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        {{-- end agenda --}}

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
                                    <img src="{{ Storage::url($item->image) }}" width="89" height="89" alt=""
                                        class="img-customer">
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
