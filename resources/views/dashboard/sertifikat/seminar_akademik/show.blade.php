<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sertifikat</title>
    <style>
        .sertifikat::after {
            content: "";
            opacity: 0.10;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-image: url({{ asset('assets/img/logo/himti.png') }});
        }

        .sertifikat {
            border: 2px solid #000;
            padding: 20px;
            position: relative;

        }

        .ttd {
            margin-top: 150px;
        }

        .barcode {
            position: absolute;
        }



        @media only screen and (max-width: 1500px) {
            .code {
                margin-right: 90px;
            }
        }

        @media only screen and (max-width: 768px) {
            .code {
                margin-right: 0px;

            }
        }
    </style>
</head>

<body>

    <div class="container my-4 ">
        <div class="text-right my-4">
            <a href="{{ route('sertif-download', $sertifikat->id) }}" class="btn btn-danger">PDF</a>
        </div>
        <div class="sertifikat">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <img src="{{ asset('assets/img/logo/umt.png') }}" alt="gambar" width="80">
                    <img src="{{ asset('assets/img/logo/himti.png') }}" alt="gambar" width="100">
                </div>
            </div>
            <div class="row justify-content-end code">
                <div class="col-sm-6 barcode">
                    <div class="visible-print text-end">
                        {!! QrCode::size(100)->generate($sertifikat->id) !!}
                    </div>
                </div>
            </div>
            <h1 class="text-center my-4 text-bold uppercase">SERTIFIKAT</h1>
            <p class="text-center mb-3">Diberikan Kepada:</p>
            <h1 class="text-center"><u>{{ $sertifikat->nama_peserta }}</u></h1>
            <h5 class="text-center">NIM: {{ $sertifikat->nim }}</h5>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <p class="text-center">Atas Pertisipasinya Dalam Mengikuti Kegiatan Seminar Akademik Himpunan
                        Mahasiswa
                        Teknik
                        Informatika Universitas Muhammadiyah Tangerang</p>
                </div>
            </div>
            <div class="ttd">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img src="{{ asset('assets/img/ttd/buyani.png') }}" alt="ttd" width="100">
                        </div>
                        <hr>
                        <h6 class="text-center">Ahmad Saifullah</h6>
                        <h6 class="text-center">Nidn</h6>
                    </div>
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img src="{{ asset('assets/img/ttd/buyani.png') }}" alt="ttd" width="100">
                        </div>
                        <hr>
                        <h6 class="text-center">Ahmad Saifullah</h6>
                        <h6 class="text-center">Nidn</h6>
                    </div>
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img src="{{ asset('assets/img/ttd/buyani.png') }}" alt="ttd" width="100">
                        </div>
                        <hr>
                        <h6 class="text-center">Ahmad Saifullah</h6>
                        <h6 class="text-center">Nidn</h6>
                    </div>
                    <div class="col-sm-3">
                        <div class="text-center">
                            <img src="{{ asset('assets/img/ttd/buyani.png') }}" alt="ttd" width="100">
                        </div>
                        <hr>
                        <h6 class="text-center">Ahmad Saifullah</h6>
                        <h6 class="text-center">Nidn</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
