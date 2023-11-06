<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('asset/login/') ?>fonts/icomoon/style.css">

	<link rel="stylesheet" href="<?= base_url('asset/login/') ?>css/owl.carousel.min.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('asset/login/') ?>css/bootstrap.min.css">

	<!-- Style -->
	<link rel="stylesheet" href="<?= base_url('asset/login/') ?>css/style.css">

	<title>LOGIN PELANGGAN</title>
</head>

<body>
	<div class="d-md-flex half">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-md-12">
					<div class="form-block mx-auto">
						<div class="text-center mb-5">
							<h3 class="text-uppercase">Login to <strong>Pelanggan</strong></h3>
						</div>
						<?php if ($this->session->userdata('success')) {
						?>
							<div class="alert alert-primary" role="alert">
								<?= $this->session->userdata('success') ?>
							</div>
						<?php
						} ?>

						<?php if ($this->session->userdata('error')) {
						?>
							<div class="alert alert-danger" role="alert">
								<?= $this->session->userdata('error') ?>
							</div>
						<?php
						} ?>
						<form action="<?= base_url('pelanggan/clogin') ?>" method="post">
							<div class="form-group first">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control" placeholder="Your Username" id="username">
								<?= form_error('username', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group last mb-3">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" placeholder="Your Password" id="password">
								<?= form_error('password', '<small class="text-danger">', '</small>') ?>
							</div>
							<small class="text-primary">Anda belum memiliki akun? <a href="<?= base_url('Pelanggan/cLogin/register') ?>">Register!!</a></small>
							<input type="submit" value="Log In" class="btn btn-block py-2 btn-primary">
						</form>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script src="<?= base_url('asset/login/') ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('asset/login/') ?>js/popper.min.js"></script>
	<script src="<?= base_url('asset/login/') ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('asset/login/') ?>js/main.js"></script>
</body>

</html>