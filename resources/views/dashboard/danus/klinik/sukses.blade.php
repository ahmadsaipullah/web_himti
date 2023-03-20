@extends('kerangka.master')
@section('tittle', 'HIMTI-UMT | Pendaftaran Sukses')
@section('klinik', 'active')
@section('content')

    <section class="section">
        <div class="container mt-2">
            <div class="page-error">
                <div class="page-inner text-center">
                    <h1 class="text-bold text-dark">Berhasil</h1>
                    <div class="page-description">
                        Terima Kasih <b>{{ $kb->nama }}</b> Sudah Mendaftar <i class="text-dark text-bold">Kelompok
                            Belajar <b>{{ $kb->bidang }}</b></i>
                    </div>
                    <h4 class="mt-5">Silakan cek E-mail verifikasi untuk menyelesaikan proses pendaftaran</h4>
                    <div class="page-search contact-details">
                        <h4>Untuk informasi lebih lanjut</h4>
                        <h5><a href="https://www.instagram.com/himtiumt/" class="text-dark" style="text-decoration: none;"><i
                                    class="mdi mdi-instagram"> @himtiumt</i> </a></h5>
                        <h5><a href="https://api.whatsapp.com/send?phone=6287880182823" class="text-dark"
                                style="text-decoration: none;"><i class="mdi mdi-whatsapp"> 087880182823 (Ahmad
                                    Saifullah)</i> </a></h5>
                        <h5><a href="https://api.whatsapp.com/send?phone=6289698093953" class="text-dark"
                                style="text-decoration: none;"><i class="mdi mdi-whatsapp"> 089698093953 (Dimas
                                    Noufal)</i></a></h5>
                        <hr>
                        <h4>Subscribe Youtube HIMTI-UMT</h4>
                        <h5><a href="https://www.youtube.com/channel/UCiIhUjjcEp4S_kOvQU_BW8A" class="text-dark"
                                style="text-decoration: none;"><i class="mdi mdi-arrow-right-drop-circle"> HiTV</i></a></h5>
                    </div>
                    <div class="mt-3 btn btn-primary">
                        <a href="{{ route('home') }}">Back to
                            Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
