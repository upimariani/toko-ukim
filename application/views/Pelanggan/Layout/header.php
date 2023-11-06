<body class="js">

	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->


	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">


				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> 0821-2026-6161 </li>
								<li><i class="ti-email"></i> tokoukim@gmail.com</li>

							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">


								<li><i class="ti-user"></i> <a href="#"><?= $this->session->userdata('nm_pel'); ?></a></li>
								<?php
								if ($this->session->userdata('id') == '') {
									echo '<li><i class="ti-power-off"></i><a href="' . base_url('Pelanggan/cLogin') . '">Login</a></li>';
								} else {
									//informasi diskon
									$data = $this->db->query("SELECT COUNT(id_diskon) as jml FROM `diskon` WHERE member='" . $this->session->userdata('member') . "' AND diskon != '0';")->row();
									$total_diskon = $data->jml;

									if ($total_diskon != 0) {
										echo '<li><i class="ti-info"></i>Anda Memiliki <span class="badge badge-success">' . $total_diskon . '</span> barang diskon!!! Order Sekarangg...</li>';
									}


									echo '<li><i class="ti-power-off"></i><a href="' . base_url('Pelanggan/cLogin/logout') . '">Logout</a></li>';
								}
								?>

							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">

						<!--/ End Logo -->

						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">

								<form>
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div>
							<?php
							if ($this->session->userdata('id') != '') {
							?>
								<?php
								$qty = 0;
								foreach ($this->cart->contents() as $key => $value) {
									$qty += $value['qty'];
								}
								?>
								<div class="sinlge-bar shopping">
									<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?= $qty ?></span></a>
									<!-- Shopping Item -->
									<div class="shopping-item">
										<div class="dropdown-cart-header">
											<span><?= $qty ?> Items</span>
											<a href="<?= base_url('Pelanggan/cCart') ?>">View Cart</a>
										</div>
										<ul class="shopping-list">
											<?php
											foreach ($this->cart->contents() as $key => $value) {
											?>
												<li>
													<a href="<?= base_url('Pelanggan/cCart/delete/' . $value['rowid']) ?>" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
													<a class="cart-img" href="#"><img src="<?= base_url('asset/foto-produk/' . $value['picture']) ?>" alt="#"></a>
													<h4><a href="#"><?= $value['name'] ?></a></h4>
													<p class="quantity"><?= $value['qty'] ?>x - <span class="amount">Rp. <?= number_format($value['price']) ?></span></p>
												</li>
											<?php
											}
											?>

										</ul>
										<div class="bottom">
											<div class="total">
												<span>Total</span>
												<span class="total-amount">Rp. <?= number_format($this->cart->total()) ?></span>
											</div>
											<a href="<?= base_url('Pelanggan/cCheckout') ?>" class="btn animate">Checkout</a>
										</div>
									</div>
									<!--/ End Shopping Item -->
								</div>
							<?php
							}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>