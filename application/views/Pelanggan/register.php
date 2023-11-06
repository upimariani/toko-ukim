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

	<title>REGISTER PELANGGAN</title>
</head>

<body>
	<div class="d-md-flex half">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-md-12">
					<div class="form-block mx-auto">
						<div class="text-center mb-5">
							<h3 class="text-uppercase">Registered to <strong>Pelanggan</strong></h3>
						</div>
						<form action="<?= base_url('Pelanggan/cLogin/register') ?>" method="post">
							<div class="form-group first">
								<label for="username">Nama Pelanggan *</label>
								<input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control" placeholder="Your Name">
								<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group first">
								<label for="username">No Telepon *</label>
								<input type="number" name="no_hp" value="<?= set_value('no_hp') ?>" class="form-control" placeholder="Your Phone Number">
								<?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group first">
								<label for="username">Alamat *</label>
								<input type="text" name="alamat" value="<?= set_value('alamat') ?>" class="form-control" placeholder="Your Address">
								<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group first">
										<label for="username">Username *</label>
										<input type="text" name="username" value="<?= set_value('username') ?>" class="form-control" placeholder="Your Username">
										<?= form_error('username', '<small class="text-danger">', '</small>') ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group first">
										<label for="email">Email *</label>
										<input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Your Email">
										<?= form_error('email', '<small class="text-danger">', '</small>') ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group last mb-3">
										<label for="password">Password *</label>
										<input type="password" name="password" value="<?= set_value('password') ?>" class="form-control" placeholder="Your Password">
										<?= form_error('password', '<small class="text-danger">', '</small>') ?>
									</div>
								</div>
							</div>
							<small class="text-primary">Anda sudah memiliki akun? <a href="<?= base_url('Pelanggan/cLogin') ?>">Login!!</a></small>
							<button type="submit" class="btn btn-block py-2 btn-primary">Register</button>
						</form>
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