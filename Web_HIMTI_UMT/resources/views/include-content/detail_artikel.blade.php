@extends('kerangka.master')
@section('tittle','HIMTI-UMT | Detail Artikel')
@section('menuArtikel','active')
@section('content')

    <section id="speakers-details">
        <div class="container">
            <div class="section-header text-center pb-5">
                <h2>Detail Artikel</h2>
                <hr width="30%">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ Storage::url($artikel->image)}}" alt="Speaker 1" class="img-fluid">
                </div>

                <div class="col-md-6 justify-content-center">
                    <div class="align-items-lg-center"><br><br><br>
                        <h2>{{$artikel->tittle}}</h2>
                        <h5>{{$artikel->deskripsi}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br>



