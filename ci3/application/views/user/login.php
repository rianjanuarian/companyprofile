<!DOCTYPE html>
<html lang="en">
    <head>
    <script src="https://kit.fontawesome.com/4f7eb700fd.js" crossorigin="anonymous"></script>
        <meta charset= "UTF-8">
        <meta name="viewport" content="width=device-width,initial0scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel = "stylesheet" href="<?php echo base_url() ?>assets/user/css/login.css">
        <title>Kentang Tech</title>
 <body>       

<div class="container" id="container">
	<div class="form-container sign-up-container">
		
		<!--***************************** REGISTER ***************************************-->
		<form action="<?= base_url('home/login') ?>" method="post">
			<h1>Buat Akun</h1>
</br>
			<input type="text" name="username1" placeholder="Username" value="<?= set_value('username1') ?>" />
			<?= form_error('username1', '<small class="text-danger pl-2">','</small>'); ?>
			<input type="text"name="name" placeholder="Name" value="<?= set_value('name') ?>"/>
			<?= form_error('name', '<small class="text-danger pl-2">','</small>'); ?>
			<input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" />
			<?= form_error('email', '<small class="text-danger pl-2">','</small>'); ?>
			<input type="text" name="nomor_hp" placeholder="No Hp" value="<?= set_value('nomor_hp') ?>"/>
			<?= form_error('nomor_hp', '<small class="text-danger pl-2">','</small>'); ?>
            <input type="password" id="password1" name="password1" placeholder="Password" />
			<?= form_error('password1', '<small class="text-danger pl-2">','</small>'); ?>
			<input type="password" id="password2" name="password2" placeholder="Re-typePassword" />
			
</br>
			<button type="submit">Daftar</button>
		</form>
	</div>
	<div class="form-container sign-in-container">

	<!--************************************ AKHIR REGISTER *******************************-->
	
		<!-- ************************ LOGIN **************************************-->
		
		<?= $this->session->flashdata('message') ?>
		
		<form method="post" action="<?= base_url('home/login')?>">
			<h1>Login</h1>
</br>
			
			<input type="text" name="username" placeholder="Username"<?= set_value('username')?> />
			<?= form_error('username', '<small class="text-danger pl-2">','</small>'); ?>
			<input type="password" name="password" placeholder="Password" />
			<?= form_error('password', '<small class="text-danger pl-2">','</small>'); ?>
</br>
<button type="submit">Masuk</button>
		</form>

		<!-- ************************ AKHIR LOGIN **************************************-->
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


<script src="<?php echo base_url() ?>assets/user/js/login.js"></script>
</body>
</html>