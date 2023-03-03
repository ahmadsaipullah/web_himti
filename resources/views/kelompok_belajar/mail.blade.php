<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelompok Belajar</title>

    <style>
        body {
            background-color: #bdc3c7;
            margin: 0;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            margin: 20%;
            text-align: center;
            margin: 0px auto;
            width: 580px;
            max-width: 580px;
            margin-top: 10%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        .garis {
            width: 75%;
        }

        .footer {
            margin-top: 5%;
        }
    </style>
</head>

<body>
    <div class="card" style="text-align: center;">
        <h1>Berhasil</h1>
        <p>Terima Kasih <b>{{ $nama }}</b> Sudah Mendaftar Kelompok Belajar </p>
        <hr class="garis">
        <p>Silakan klik link dibawah ini untuk memasuki group Kelompok belajar</p>
        <a href="https://chat.whatsapp.com/DYe9VFVMGuiAXuMohVOnkh">Klik disini</a>
        <hr class="garis">
        <br>
        <hr class="garis">
        <strong>Note : Mohon simpan email sebagai verifkasi pendaftaran kepada contact person
            yang tertera</strong>
        <br>
        <br>
        <img src=" {{ asset('assets/img/logo/himti.png') }} " style="width:40%;">
        <h4>Untuk informasi lebih lanjut : </h4>
        <h5>Instagram :<a href="https://www.instagram.com/himtiumt/" style="text-decoration: none;"> @himtiumt</a>
        </h5>
        <h5>Whatsapp :<a href="https://api.whatsapp.com/send?phone=6287880182823" style="text-decoration: none;">
                087880182823 (Ahmad Saifullah)</a></h5>
        <h5>Whatsapp :<a href="https://api.whatsapp.com/send?phone=6289698093953 " style="text-decoration: none;">
                089698093953 (Dimas Noufal)</a></h5>
        <div class="footer">
            Copyright &copy; HIMTI-UMT 2023
        </div>
    </div>
</body>

</html>
