<!-- Header Inner -->
<div class="header-inner">
	<div class="container">
		<div class="cat-nav-head">
			<div class="row">
				<div class="col-12">
					<div class="menu-area">
						<!-- Main Menu -->
						<nav class="navbar navbar-expand-lg">
							<div class="navbar-collapse">
								<div class="nav-inner">
									<ul class="nav main-menu menu navbar-nav">
										<li class="active"><a href="<?= base_url('pelanggan/ckatalog') ?>">Home</a></li>
										<li><a href="<?= base_url('Pelanggan/cShopGrid') ?>">Product</a></li>

										<li><a href="<?= base_url('Pelanggan/cProfil') ?>">My Account</a></li>
										<li><a href="<?= base_url('Pelanggan/cStatusOrder') ?>">My Order</a></li>
										<li><a href="<?= base_url('Pelanggan/cChatting') ?>">Chatting</a></li>
										<li><a href="<?= base_url('Pelanggan/cStatusOrder/all_review') ?>">All Kritik Saran</a></li>
									</ul>
								</div>
							</div>
						</nav>
						<!--/ End Main Menu -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/ End Header Inner -->
</header>
<!--/ End Header -->

<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="blog-single.html">Detail Pesanan</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Total Amount -->
				<div class="total-amount">
					<div class="row">
						<div class="col-lg-5">
							<div class="right">
								<h2>Detail Pesanan</h2><br>
								<ul>
									<li><i class="fa fa-barcode" aria-hidden="true"></i>Id Transaksi<span class="badge badge-warning"> <?= $detail['transaksi']->id_transaksi ?></span></li>
									<li>Atas Nama<span><?= $detail['transaksi']->nm_pel ?></span></li>
									<li>No Telepon<span><?= $detail['transaksi']->no_tlpon ?></span></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-7 col-md-7 col-12">
							<div class="right">
								<br>
								<br>
								<br>
								<ul>
									<li>Tanggal Transaksi<span><?= $detail['transaksi']->tgl_transaksi ?></span></li>
									<li>Alamat Pengiriman<span><?= $detail['transaksi']->alamat ?> Provinsi <?= $detail['transaksi']->provinsi ?> Kota <?= $detail['transaksi']->kota ?> Expedisi. <?= $detail['transaksi']->expedisi ?>, <?= $detail['transaksi']->estimasi ?></span></li>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Total Amount -->
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<!-- Shopping Summery -->
				<table class="table shopping-summery">
					<thead>
						<tr class="main-hading">
							<th>No</th>
							<th>Nama Produk</th>
							<th class="text-center">Quantity</th>
							<th class="text-center">Harga</th>
							<th class="text-center">Subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($detail['pesanan'] as $key => $value) {
						?>
							<tr>
								<td class="text-center"><?= $no++ ?>.</td>
								<td><?= $value->nama_produk ?></td>
								<td class="text-center"><?= $value->qty ?> x</td>
								<td class="text-center">Rp. <?= number_format($value->harga - ($value->harga * $value->diskon / 100))  ?></td>
								<td class="text-center">Rp. <?= number_format(($value->harga - ($value->harga * $value->diskon / 100)) * $value->qty) ?></td>
							</tr>
						<?php
						}
						?>

					</tbody>
				</table>
				<!--/ End Shopping Summery -->
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<!-- Total Amount -->
				<div class="total-amount">
					<div class="row">
						<div class="col-lg-8 col-md-5 col-12">
							<?php
							if ($detail['transaksi']->status_order == '0') {
							?>
								<h3>Bukti Pembayaran</h3>
								<p>Transfer Via Bank BRI / 0123-3456-0987-09-2</p>
								<?php echo form_open_multipart('pelanggan/cStatusOrder/pembayaran/' . $detail['transaksi']->id_transaksi); ?>

								<input type="file" name="gambar" class="form-control">
								<button type="submit" class="btn mt-3">Upload</button>
								</form>
							<?php
							}
							if ($detail['transaksi']->status_order == '3') {
							?>
								<h3>Pesanan Diterima</h3>
								<p>Konfirmasi jika pesanan anda telah diterima</p>
								<?php echo form_open('pelanggan/cStatusOrder/diterima/' . $detail['transaksi']->id_transaksi); ?>
								<input type="hidden" name="pelanggan" value="<?= $detail['transaksi']->id_pelanggan ?>">
								<input type="hidden" name="total_belanja" value="<?= $detail['transaksi']->total_bayar ?>">
								<?php
								$point = 0;
								$point = (0.5 / 100) * $detail['transaksi']->total_bayar;

								?>
								<input type="hidden" name="point" value="<?= $point ?>">
								<button type="submit" class="btn mt-3">Konfirmasi</button>
								</form>
							<?php
							}
							?>
							<?php
							if ($detail['transaksi']->status_order == '4') {
							?>
								<h3>Kritik dan Saran</h3>
								<p>Silahkan Untuk mengisi kritik dan saran di kolom pesan berikut!</p>
								<label class="mt-3">Kotak Kritik dan Saran</label>
								<form action="<?= base_url('pelanggan/cstatusorder/kritiksaran') ?>" method="POST">
									<textarea class="form-control" type="text" name="review" required></textarea>
									<button class="btn mt-3" type="submit">Kirim</button>
								</form>
							<?php
							}
							?>

						</div>
						<div class="col-lg-4 col-md-7 col-12">
							<div class="right">
								<ul>
									<li>Subtotal<span>Rp. <?= number_format($detail['transaksi']->grand_total) ?></span></li>
									<li>Shipping<span>Rp. <?= number_format($detail['transaksi']->total_bayar - $detail['transaksi']->grand_total) ?></span></li>
									<li class="last">Total<span>Rp. <?= number_format($detail['transaksi']->total_bayar) ?></span></li>
								</ul>
								<div class="button5">
									<a href="<?= base_url('pelanggan/cStatusOrder') ?>" class="btn">Kembali</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Total Amount -->
			</div>
		</div>
	</div>
</div>
<!--/ End Shopping Cart -->

<!-- Start Shop Services Area  -->
<section class="shop-services section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-rocket"></i>
					<h4>Free shiping</h4>
					<p>Orders over $100</p>
				</div>
				<!-- End Single Service -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-reload"></i>
					<h4>Free Return</h4>
					<p>Within 30 days returns</p>
				</div>
				<!-- End Single Service -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-lock"></i>
					<h4>Sucure Payment</h4>
					<p>100% secure payment</p>
				</div>
				<!-- End Single Service -->
			</div>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Start Single Service -->
				<div class="single-service">
					<i class="ti-tag"></i>
					<h4>Best Peice</h4>
					<p>Guaranteed price</p>
				</div>
				<!-- End Single Service -->
			</div>
		</div>
	</div>
</section>
<!-- End Shop Newsletter -->

<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
	<div class="container">
		<div class="inner-top">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-12">
					<!-- Start Newsletter Inner -->
					<div class="inner">
						<h4>Newsletter</h4>
						<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
						<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
							<input name="EMAIL" placeholder="Your email address" required="" type="email">
							<button class="btn">Subscribe</button>
						</form>
					</div>
					<!-- End Newsletter Inner -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Shop Newsletter -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
			</div>
			<div class="modal-body">
				<div class="row no-gutters">
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<!-- Product Slider -->
						<div class="product-gallery">
							<div class="quickview-slider-active">
								<div class="single-slider">
									<img src="images/modal1.jpg" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal2.jpg" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal3.jpg" alt="#">
								</div>
								<div class="single-slider">
									<img src="images/modal4.jpg" alt="#">
								</div>
							</div>
						</div>
						<!-- End Product slider -->
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="quickview-content">
							<h2>Flared Shift Dress</h2>
							<div class="quickview-ratting-review">
								<div class="quickview-ratting-wrap">
									<div class="quickview-ratting">
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="#"> (1 customer review)</a>
								</div>
								<div class="quickview-stock">
									<span><i class="fa fa-check-circle-o"></i> in stock</span>
								</div>
							</div>
							<h3>$29.00</h3>
							<div class="quickview-peragraph">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
							</div>
							<div class="size">
								<div class="row">
									<div class="col-lg-6 col-12">
										<h5 class="title">Size</h5>
										<select>
											<option selected="selected">s</option>
											<option>m</option>
											<option>l</option>
											<option>xl</option>
										</select>
									</div>
									<div class="col-lg-6 col-12">
										<h5 class="title">Color</h5>
										<select>
											<option selected="selected">orange</option>
											<option>purple</option>
											<option>black</option>
											<option>pink</option>
										</select>
									</div>
								</div>
							</div>
							<div class="quantity">
								<!-- Input Order -->
								<div class="input-group">
									<div class="button minus">
										<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
											<i class="ti-minus"></i>
										</button>
									</div>
									<input type="text" name="quant[1]" class="input-number" data-min="1" data-max="1000" value="1">
									<div class="button plus">
										<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
											<i class="ti-plus"></i>
										</button>
									</div>
								</div>
								<!--/ End Input Order -->
							</div>
							<div class="add-to-cart">
								<a href="#" class="btn">Add to cart</a>
								<a href="#" class="btn min"><i class="ti-heart"></i></a>
								<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
							</div>
							<div class="default-social">
								<h4 class="share-now">Share:</h4>
								<ul>
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal end -->