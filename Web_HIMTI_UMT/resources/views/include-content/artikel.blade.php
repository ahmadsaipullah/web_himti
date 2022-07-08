@extends('kerangka.master')
@section('tittle','HIMTI-UMT | Artikel')
@section('menuArtikel','active')
@section('content')

{{-- artikel --}}
  <div class="container">
    <section id="speakers">
      <div class="section-title" data-aos="fade-up">
        <h2>HIMTI</h2>
        <p>Artikel</p>
      </div>
      <div class="col-12 text-center pb-2">
        <p>Beberapa Artikel Dari kami</p>
      </div>
      <div class="row">
        @foreach ($artikels as $artikel)


        <div class="col-lg-4 col-md-4">
          <div class="speaker" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ Storage::url($artikel->image)}}" alt="Speaker 1" class="img-fluid">
            <div class="details">
              <h3><a href="{{ route('detailArtikel', $artikel->id)}}">{{$artikel->tittle}}</a></h3>
            </div>
          </div>
        </div>
        @endforeach
    </section>
{{-- akhir artikel --}}
@endsection
