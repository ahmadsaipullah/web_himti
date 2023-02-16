@extends('kerangka.master')
@section('tittle', 'HIMTI-UMT | Tutorial')
@section('menuTutorial', 'active')
@section('content')


    <div class="content-wrapper">
        <div class="container">
            {{-- tutorial --}}
            <section id="team" class="team">
                <div class="container">
                    <div class="section-title" data-aos="fade-up">
                        <h2>HIMTI</h2>
                        <p>Tutorial Youtube</p>
                    </div>
                    @forelse ($tutorial as $index => $item)
                        @if ($index % 2 == 0)
                            <div class="features-row section-bg" id="advanced-features">
                                <div class="container" id="bg">
                                    <div class="row">
                                        <div class="col-12">
                                            <iframe class="advanced-feature-img-right wow fadeInRight" width="555"
                                                height="371" src="https://www.youtube.com/embed/{{ $item->link }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                            <div class="wow fadeInLeft">
                                                <h2>{{ $item->judul }} (Textbox)</h2>
                                                <i class="ion-ios-paper-outline" class="wow fadeInRight"
                                                    data-wow-duration="0.5s"></i>
                                                <p class="wow fadeInLeft" data-wow-duration="0.5s">Penjelasan singkat maksud
                                                    dari
                                                    video</p>
                                                <i class="ion-ios-color-filter-outline wow fadeInRight"
                                                    data-wow-delay="0.2s" data-wow-duration="0.5s"></i>
                                                <p class="wow fadeInLeft" data-wow-delay="0.2s" data-wow-duration="0.5s">
                                                    Tools
                                                    apa
                                                    saja yang
                                                    digunakan</p>
                                                <i class="ion-ios-barcode-outline wow fadeInRight" data-wow-delay="0.4"
                                                    data-wow-duration="0.5s"></i>
                                                <p class="wow fadeInLeft" data-wow-delay="0.4s" data-wow-duration="0.5s">
                                                    Links
                                                    pembelajaran yang
                                                    berhubungan dengan video.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="features-row mt-5 section-bg" id="advanced-features">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <iframe class="advanced-feature-img-left" width="555" height="371"
                                                src="https://www.youtube.com/embed/{{ $item->link }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                            <div class="wow fadeInRight">
                                                <h2>{{ $item->judul }} (Textbox)</h2>
                                                <i class="ion-ios-paper-outline" class="wow fadeInRight"
                                                    data-wow-duration="0.5s"></i>
                                                <p class="wow fadeInRight" data-wow-duration="0.5s">Penjelasan singkat
                                                    maksud dari
                                                    video</p>
                                                <i class="ion-ios-color-filter-outline wow fadeInRight"
                                                    data-wow-delay="0.2s" data-wow-duration="0.5s"></i>
                                                <p class="wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s">
                                                    Tools apa
                                                    saja yang
                                                    digunakan</p>
                                                <i class="ion-ios-barcode-outline wow fadeInRight" data-wow-delay="0.4"
                                                    data-wow-duration="0.5s"></i>
                                                <p class="wow fadeInRight" data-wow-delay="0.4s" data-wow-duration="0.5s">
                                                    Links
                                                    pembelajaran yang
                                                    berhubungan dengan video</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <h4 class="text-center">Cooming Soon</h4>
                    @endforelse
                </div>
            </section>
            {{-- end tutorial --}}
        @endsection
