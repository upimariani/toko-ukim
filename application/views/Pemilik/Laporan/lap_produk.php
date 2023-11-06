<!-- Content wrapper -->
<div class="content-wrapper">
	<!-- Content -->

	<div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Laporan /</span> Analisis Produk</h4>
		<div class="row">
			<div class="col-12 table-responsive">
				<canvas id="laporan_produk" height="100"></canvas>


			</div>
			<!-- /.col -->
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="card card-light">
					<div class="card-header">
						<h3 class="card-title">Laporan Harian</h3>
					</div>
					<div class="card-body">
						<?php
						echo form_open('Pemilik/cAnalisis_Produk/lap_harian_produk') ?>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label>Tanggal</label>
									<select name="tanggal" class="form-control">
										<?php
										$mulai = 1;
										for ($i = $mulai; $i < $mulai + 31; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Bulan</label>
									<select name="bulan" class="form-control">
										<?php
										$mulai = 1;
										for ($i = $mulai; $i < $mulai + 12; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Tahun</label>
									<select name="tahun" class="form-control">
										<?php
										$mulai = date('Y') - 1;
										for ($i = $mulai; $i < $mulai + 10; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info mt-3"><i class="fa fa-print"></i> View Laporan</button>
								</div>
							</div>
						</div>
						<?php
						echo form_close() ?>
					</div>
				</div>
			</div>


			<div class="col-md-4">
				<div class="card card-light">
					<div class="card-header">
						<h3 class="card-title">Laporan Bulanan</h3>
					</div>
					<div class="card-body">
						<?php
						echo form_open('Pemilik/cAnalisis_Produk/lap_bulanan_produk') ?>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Bulan</label>
									<select name="bulan" class="form-control">
										<?php
										$mulai = 1;
										for ($i = $mulai; $i < $mulai + 12; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Tahun</label>
									<select name="tahun" class="form-control">
										<?php
										$mulai = date('Y') - 1;
										for ($i = $mulai; $i < $mulai + 10; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info mt-3"><i class="fa fa-print"></i> View Laporan</button>
								</div>
							</div>
						</div>
						<?php
						echo form_close() ?>
					</div>
				</div>
			</div>


			<div class="col-md-4">
				<div class="card card-light">
					<div class="card-header">
						<h3 class="card-title">Laporan Tahunan</h3>
					</div>
					<div class="card-body">
						<?php
						echo form_open('Pemilik/cAnalisis_Produk/lap_tahunan_produk') ?>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Tahun</label>
									<select name="tahun" class="form-control">
										<?php
										$mulai = date('Y') - 1;
										for ($i = $mulai; $i < $mulai + 10; $i++) {
											$sel = $i == date('Y') ? 'selected="selected"' : '';
											echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-info mt-3"><i class="fa fa-print"></i> View Laporan</button>
								</div>
							</div>
						</div>
						<?php
						echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>