
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Authenticate</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
  <link rel="stylesheet" href="{{ asset('user/css/templatemo-softy-pinko.css') }}">
</head>
<body>
    {{-- Preloader --}}
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    {{-- End Preloader --}}
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="/register/auth" method="POST">
            @csrf
			<h1>Create Account</h1>
			<span>or use your Nisn for registration</span>
			<input type="text" name="name" placeholder="Username" required/>
			<input type="text" name="nisn" placeholder="Nisn" required/>
			{{-- <input type="file" name="image" placeholder="image" required/> --}}
			<input type="password" name="password" placeholder="*******" required/>
            <input type="password" name="confirm_password" id="confirm_password" name="confirmed" placeholder="Confirm Password" required>
			<button type="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="/login/auth" method="POST">
            @csrf
			<h1>Sign in</h1>
			<span>or use your account</span>
            <input type="text" name="nisn_name" value="{{ Session::get('nisn_name') }}" placeholder="Nisn" />
			<input type="password" name="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button name="submit" type="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Hallo Silahkan login!</h1>
				<p>Untuk tetap terhubung dengan kami, silakan login dengan informasi pribadi Anda</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hallo! Selamat Datang</h1>
				<p>Tidak Punya Akun! , Mendaftarlah terlebih dahulu</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<!-- partial -->
  <script  src="{{ asset('assets/js/auth.js') }}"></script>
  <script  src="{{ asset('user/js/custom.js') }}"></script>
  <script src="{{ asset('user/js/jquery-2.1.0.min.js') }}"></script>

  <!-- Bootstrap -->
  <script src="{{ asset('user/js/popper.js') }}"></script>
  <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>

  <!-- Plugins -->
  <script src="{{ asset('user/js/scrollreveal.min.js') }}"></script>
  <script src="{{ asset('user/js/waypoints.min.js') }}"></script>
  <script src="{{ asset('user/js/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('user/js/imgfix.min.js') }}"></script>

  <!-- Global Init -->
  <script src="{{ asset('user/js/custom.js') }}"></script>
  @include('sweetalert::alert')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(window).on('load', function () {
        // Hide the preloader when the page has finished loading
        $('#preloader').fadeOut('slow');
    });
</script>
</body>
</html>
