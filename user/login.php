<!DOCTYPE html>
<html lang="en">
    <head>
    <script src="https://kit.fontawesome.com/4f7eb700fd.js" crossorigin="anonymous"></script>
        <meta charset= "UTF-8">
        <meta name="viewport" content="width=device-width,initial0scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel = "stylesheet" href="css/login.css">
        <title> Login</title>
 <body>       

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Buat Akun</h1>
</br>
			
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
            <input type="password" placeholder="Password" />
</br>
			<button>Daftar</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Login</h1>
</br>
			
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
</br>
<button><a href="toko/index.php">Masuk</a></button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Sudah Punya Akun?</h1>
</br>
</br>
				<button class="ghost" id="signIn">Login</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Belum Punya Akun?</h1>
</br>
</br>
				<button class="ghost" id="signUp">Daftar</button>
			</div>
		</div>
	</div>
</div>


<script src="js/login.js"></script>
</body>
</html>