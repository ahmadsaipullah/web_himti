<!DOCTYPE html>
<html lang="en">

<head>
    <title>HIMTI - UMT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <!-- Favicons -->
    <link href="{{ asset('assets/images/HIMTI.png') }}" rel="icon">
    <link href="{{ asset('assets/images/HIMTI.png') }}" rel="apple-touch-icon">

    <style>
        body {
            background-image: url('assets/images/pattren.png');
            background-size: cover;

        }

        .container .row .col header h1,
        header h2 {
            color: #191970;
            text-shadow: 0 5px 5px rgba(0, 0, 0, 0.7);
        }

        .row {
            margin-top: 10px;
        }

        .img-fluid {
            padding-top: 70px;
        }

        .border {
            box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.6);
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container">
        <div class="logo justify-content-center d-flex">
            <img src="{{ asset('assets/images/himti.png') }}" alt="gambar" width="350px" class="img-fluid">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 border bg-warning">
                @if (session()->has('LoginError'))
                    <div class="mt-4 alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('LoginError') }}
                    </div>
                @endif
                <form action="{{ route('log') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3 mt-3 input-box">
                            <input type="email" name="email" id="email"
                                class="form-control
                            @error('email') is invalid @enderror"
                                placeholder="Email" required>
                        </div>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <input type="password" name="password" id="password"
                                class="form-control
                            @error('password') is invalid @enderror"
                                placeholder="Password" required>
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
