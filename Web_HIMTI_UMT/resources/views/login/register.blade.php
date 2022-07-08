<!DOCTYPE html>
<html lang="en">

<head>
	<title>HIMTI - UMT</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/css/style.min.css">
	<!-- Favicons -->
	<link href="{{ asset('assets/images/HIMTI.png')}}" rel="icon">
	<link href="{{ asset('assets/images/HIMTI.png')}}" rel="apple-touch-icon">
	<style>
		body
        {
			background: #ffffff url(assets/images/HIMTI.png);
			background-repeat: no-repeat;
			background-size: 70% 100%;
			background-attachment: fixed;
		}
		.container .row .col header h1,header h2
        {
			color: #191970;
			text-shadow: 0 5px 5px rgba(0, 0, 0, 0.7);
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 300px;">
			<div class="col-md-8 mt-4"></div>
			<div class="col-md-4">
				<form action="{{ route('regist')}}" method="POST">
                    @csrf
					<div class="form-row">
						<div class="col-md-4"></div>
						<div class="col-md-8 mb-3">
							<input type="text" name="name" id="name" class="form-control
                            @error('name') is invalid @enderror" placeholder="Username">
						</div>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
					</div>
                    <div class="form-row">
						<div class="col-md-4"></div>
						<div class="col-md-8 mb-3">
							<input type="email" name="email" id="email" class="form-control
                            @error('email') is invalid @enderror" placeholder="Email">
						</div>
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
					</div>
                    <div class="form-row">
						<div class="col-md-4"></div>
						<div class="col-md-8 mb-3">
							<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="no_hp" id="no_hp" class="form-control
                            @error('no_hp') is invalid @enderror" placeholder="No Handphone">
						</div>
                        @error('no_hp')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
					</div>
					<div class="form-row">
						<div class="col-md-4"></div>
						<div class="col-md-8 mb-3">
							<input type="password" name="password" id="password" class="form-control
                            @error('password') is invalid @enderror" placeholder="Password">
						</div>
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
					</div>
                    <div class="form-row">
						<div class="col-md-4"></div>
						<div class="col-md-8 mb-3">
							<input type="password" name="verifikasi_password" id="verifikasi_password" class="form-control @error('verifikasi_password') is invalid @enderror" placeholder="Verifikasi Password">
						</div>
                        @error('verifikasi_password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
					</div>
					<div class="form-row">
						<div class="col-md-4"></div>
						<div class="col-md-8 mb-3">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
